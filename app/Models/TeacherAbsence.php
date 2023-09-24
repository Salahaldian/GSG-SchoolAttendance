<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAbsence extends Model
{
    use HasFactory;

    protected $table = 'absences_teachers';

    protected $fillable = [
        'teacher_id', 'date',
        'day', 'reason',
    ];

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

}
