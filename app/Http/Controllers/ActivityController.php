<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'activity_name' => 'required',
            'activity_date' => 'required|date',
            'description' => 'nullable',
        ]);

        \App\Models\Activity::create($request->all());

        return back()->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function destroy(string $id)
    {
        $activity = \App\Models\Activity::findOrFail($id);
        $activity->delete();

        return back()->with('success', 'Kegiatan berhasil dihapus.');
    }
}
