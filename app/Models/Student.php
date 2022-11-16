<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

    protected $casts = [
        'created_at' => 'date:d-m-Y'
    ];

    protected $fillable = [
        'name',
        'teacher_id',
        'age',
        'gender'

    ];
    public static function getStudents()
    {
        return Student::join('teachers', 'teachers.id', '=', 'students.teacher_id')
            ->select('students.*', 'teachers.name as teacher')
            ->orderBy('students.id', 'DESC')->paginate(10);
    }

    public static function getStudent($id)
    {
        return Student::join('teachers', 'teachers.id', '=', 'students.teacher_id')
            ->select('students.*', 'teachers.name as teacher')
            ->where('students.id', $id)
            ->first();
    }

    public function available_students()
    {
        return $this->hasMany('App\Models\Teacher', 'teacher_id')->orderBy('created_at', 'desc');
    }

    public static function createDetails($name, $teacher_id, $age, $gender)
    {
        $student = new Student();
        $student->name = $name;
        $student->teacher_id = $teacher_id;
        $student->age = $age;
        $student->gender = $gender;
        $student->save();
        return $student;
    }
    public static function updateDetails($id, $name, $teacher_id, $age, $gender)
    {
        return Student::where('id', $id)
            ->update([
                'name' => $name,
                'teacher_id' => $teacher_id,
                'age' => $age,
                'gender' => $gender
            ]);

    }
}
