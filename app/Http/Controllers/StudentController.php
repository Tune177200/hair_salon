<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Lấy danh sách sinh viên từ database
        $students = Student::all();

        // Trả về view 'students.index' và truyền danh sách sinh viên cho view
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'date_of_birth' => 'required|date',
        ]);

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }
}
