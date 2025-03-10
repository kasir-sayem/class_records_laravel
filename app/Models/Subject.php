<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['sname', 'category'];

    public function marks()
    {
        return $this->hasMany(Mark::class, 'subjectid');
    }
}
