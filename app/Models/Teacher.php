<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'address', 'mobile'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function absences()
    {
        return $this->hasMany(TeacherAbsence::class);
    }
}
