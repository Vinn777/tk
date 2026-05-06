<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = \App\Models\Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'grade' => 'required|in:KB,TK A,TK B',
            'gender' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'parent_name' => 'required',
            'phone' => 'required',
        ]);

        \App\Models\Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $student = \App\Models\Student::with('activities')->findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit(string $id)
    {
        $student = \App\Models\Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        $student = \App\Models\Student::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'grade' => 'required|in:KB,TK A,TK B',
            'gender' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'parent_name' => 'required',
            'phone' => 'required',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $student = \App\Models\Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
