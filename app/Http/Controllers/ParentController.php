<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role !== 'parent' || !$user->student_id) {
            return redirect()->route('dashboard');
        }

        $student = \App\Models\Student::with('activities')->findOrFail($user->student_id);
        return view('parent.dashboard', compact('student'));
    }
}
