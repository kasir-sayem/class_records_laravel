<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    
    protected $fillable = ['id', 'sname', 'category'];
    public $incrementing = false; // Since we're providing explicit IDs 

    public function marks()
    {
        return $this->hasMany(Mark::class, 'subjectid');
    }
}
