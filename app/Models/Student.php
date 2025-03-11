<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'sname', 'class', 'boy'];
    public $incrementing = false; // Since we're providing explicit IDs

    

    public function marks()
    {
        return $this->hasMany(Mark::class, 'studentid');
    }
}
