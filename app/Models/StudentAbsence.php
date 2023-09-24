<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAbsence extends Model
{
    use HasFactory;

    protected $table = 'absences_students';

    protected $fillable = [
        'student_id', 'date',
        'day', 'reason',
    ];

    public function student() {
        return $this->belongsTo(Student::class);
    }

}
