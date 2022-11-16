<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';

    protected $casts = [
        'created_at' => 'date:d-m-Y'
    ];

    protected $fillable = [
        'name',
        'role',
        'status'

    ];
    public static function getTeacher($id)
    {
        return Teacher::where('id', $id)->first();
    }

    public static function getTeachers()
    {
        return Teacher::orderBy('id', 'DESC')->paginate(10);
    }

    public static function createDetails($name, $role)
    {
        $teacher = new Teacher();
        $teacher->name = $name;
        $teacher->role = $role;
        $teacher->save();
        return $teacher;
    }

    public static function updateDetails($id, $name, $role)
    {
        return Teacher::where('id', $id)
            ->update([
                'name' => $name,
                'role' => $role
            ]);

    }

    public static function checkExistsDetails($name, $role)
    {
        $teacher = Teacher::where('name', '=', $name)->where('role', '=', $role)->first();
        if ($teacher) {
            return true;
        }
        return null;
    }

}
