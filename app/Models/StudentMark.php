<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;
    protected $table = 'students_marks';

    protected $casts = [
       // 'created_at' => 'date:MMM Do YYYY'
    ];

    protected $fillable = [
        'stud_id',
        'maths',
        'science',
        'history',
        'term',
        'total_marks'      

    ];
    public static function getStudentsMarks()
    {
        return StudentMark::join('students', 'students.id', '=', 'students_marks.stud_id')
            ->select('students.id','students.name', 'students_marks.*')
            ->orderBy('students_marks.id', 'DESC')->paginate(10);
    }
    public static function getStudentMarks()
    {
        return StudentMark::join('students', 'students.id', '=', 'students_marks.stud_id')
            ->select('students.id','students.name', 'students_marks.*')
            ->first();
    }
    public static function createDetails($stud_id, $maths, $science, $history,$term,$total_marks)
    {
        $student = new StudentMark();
        $student->stud_id = $stud_id;
        $student->maths = $maths;
        $student->science = $science;
        $student->history = $history;
        $student->term = $term;
        $student->total_marks = $total_marks;        
        $student->save();
        return $student;
    }
    public static function updateDetails($id,$stud_id, $maths, $science, $history,$term,$total_marks)
    {
        return StudentMark::where('id', $id)
            ->update([
                'stud_id' => $stud_id,
                'maths' => $maths,
                'science' => $science,
                'history' => $history,
                'term' => $term,
                'total_marks' => $total_marks
            ]);

    }
}
