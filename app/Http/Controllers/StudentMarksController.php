<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentMark;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentMarksController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::getStudents();
        $teachers = Teacher::getTeachers();
        $marks = StudentMark::getStudentsMarks();
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalUsers = User::count();
        return view('backend.mark.index', compact('students', 'marks', 'totalStudents', 'totalTeachers', 'totalUsers'));
    }

    public function addNew(Request $request)
    {
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalUsers = User::count();
        $students = Student::getStudents();
        return view('backend.mark._add', compact('students', 'totalStudents', 'totalTeachers', 'totalUsers'));
    }

    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'student' => 'required',
                'maths' => 'required',
                'science' => 'required',
                'history' => 'required',
                'term' => 'required'

            ]);
            $totalMarks = $request->maths + $request->science + $request->history;
            $student = StudentMark::createDetails($request->student,
                $request->maths,
                $request->science,
                $request->history,
                $request->term,
                $totalMarks);
            if ($student) {
                return Redirect::back()->with('success', 'Created successfully');
            }

        } catch (\Exception$e) {
            return Redirect::back()->with('error', $e->getMessage());
        }

    }

    public function edit(Request $request, $id)
    {
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalUsers = User::count();
        $students = Student::getStudents();
        $mark = StudentMark::getStudentMarks($id);
        return view('backend.mark._edit', compact('students', 'mark', 'totalStudents', 'totalTeachers', 'totalUsers'));
    }

    public function update(Request $request, $id)
    {
        try {
            $mark = StudentMark::getStudentMarks($id);
            if ($mark) {
                $totalMarks = $request->maths + $request->science + $request->history;
                StudentMark::updateDetails($id,
                    $request->student,
                    $request->maths,
                    $request->science,
                    $request->history,
                    $request->term,
                    $totalMarks);
                return Redirect::back()->with('success', 'Successfully updated');
            }

        } catch (\Exception$e) {
            return Redirect::back()->with('error', $e->getMessage());
        }

    }

    public function delete(Request $request, $id)
    {
        try {
            $student = StudentMark::getStudentMarks($id);
            if ($student) {
                $student->delete($id);
                return Redirect::back()->with('success', 'Successfully deleted');
            }

        } catch (\Exception$e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }
}
