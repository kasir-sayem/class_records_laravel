<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = ['studentid', 'mdate', 'mark', 'type', 'subjectid'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'studentid');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subjectid');
    }
}