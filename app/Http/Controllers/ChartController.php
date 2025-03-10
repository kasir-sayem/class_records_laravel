<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        // Average marks by subject
        $subjectAverages = Mark::select('subjectid', DB::raw('AVG(mark) as average'))
            ->groupBy('subjectid')
            ->with('subject')
            ->get();
        
        $subjects = $subjectAverages->map(function ($item) {
            return $item->subject->sname;
        });
        
        $averages = $subjectAverages->map(function ($item) {
            return round($item->average, 2);
        });
        
        // Student performance over time
        $monthlyAverages = Mark::select(
                DB::raw('YEAR(mdate) as year'),
                DB::raw('MONTH(mdate) as month'),
                DB::raw('AVG(mark) as average')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
        
        $months = $monthlyAverages->map(function ($item) {
            return $item->year . '-' . str_pad($item->month, 2, '0', STR_PAD_LEFT);
        });
        
        $monthlyAvg = $monthlyAverages->map(function ($item) {
            return round($item->average, 2);
        });
        
        return view('charts.index', compact(
            'subjects', 
            'averages', 
            'months', 
            'monthlyAvg'
        ));
    }
}