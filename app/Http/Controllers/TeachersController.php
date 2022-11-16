<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeachersController extends Controller
{
    public function index(Request $request)
    {
        $teachers = Teacher::getTeachers();
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalUsers = User::count();
        return view('backend.teacher.index', compact('teachers', 'totalStudents', 'totalTeachers', 'totalUsers'));
    }

    public function addNew(Request $request)
    {
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalUsers = User::count();
        return view('backend.teacher._add', compact('totalStudents', 'totalTeachers', 'totalUsers'));
    }

    public function edit(Request $request, $id)
    {
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalUsers = User::count();
        $teacher = Teacher::getTeacher($id);
        return view('backend.teacher._edit', compact('teacher', 'totalStudents', 'totalTeachers', 'totalUsers'));
    }

    public function create(Request $request)
    {
        try {
            $validated = $request->validate([
                'full_name' => 'required',
                'role' => 'required'
            ]);
            $teacherExists = Teacher::checkExistsDetails($request->full_name, $request->role);
            if (true == $teacherExists) {
                return Redirect::back()->with('error', 'Data already exists');
            }

            $teacher = Teacher::createDetails($request->full_name, $request->role);
            if ($teacher) {
                return Redirect::back()->with('success', 'Created successfully');
            }

        } catch (\Exception$e) {
            return Redirect::back()->with('error', $e->getMessage());
        }

    }

    public function delete(Request $request, $id)
    {
        try {
            $teacher = Teacher::getTeacher($id);
            if ($teacher) {
                $teacher->delete($id);
                return Redirect::back()->with('success', 'Successfully deleted');
            }

        } catch (\Exception$e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $teacher = Teacher::getTeacher($id);
            if ($teacher) {
                Teacher::updateDetails($id, $request->full_name, $request->role);
                return Redirect::back()->with('success', 'Successfully updated');
            }

        } catch (\Exception$e) {
            return Redirect::back()->with('error', $e->getMessage());
        }

    }
}
