<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::getStudents();
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalUsers = User::count();
        return view('backend.student.index', compact('students', 'totalStudents', 'totalTeachers', 'totalUsers'));
    }

    public function addNew(Request $request)
    {
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalUsers = User::count();
        $teachers = Teacher::getTeachers();
        return view('backend.student._add', compact('teachers', 'totalStudents', 'totalTeachers', 'totalUsers'));
    }

    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'full_name' => 'required',
                'age' => 'required',
                'teacher' => 'required',
                'gender' => 'required'

            ]);

            $student = Student::createDetails($request->full_name, $request->teacher, $request->age, $request->gender);
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
        $student = Student::getStudent($id);
        $teachers = Teacher::getTeachers();
        return view('backend.student._edit', compact('student', 'teachers', 'totalStudents', 'totalTeachers', 'totalUsers'));
    }

    public function update(Request $request, $id)
    {
        try {
            $student = Student::getStudent($id);
            if ($student) {
                Student::updateDetails($id, $request->full_name, (int) $request->teacher, $request->age, $request->gender);
                return Redirect::back()->with('success', 'Successfully updated');
            }

        } catch (\Exception$e) {
            return Redirect::back()->with('error', $e->getMessage());
        }

    }

    public function delete(Request $request, $id)
    {
        try {
            $student = Student::getStudent($id);
            if ($student) {
                $student->delete($id);
                return Redirect::back()->with('success', 'Successfully deleted');
            }

        } catch (\Exception$e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }
}
