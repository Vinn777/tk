<?php

namespace App\Http\Controllers;

use App\Models\PsbRegistration;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function psb()
    {
        return view('psb');
    }

    public function psbStore(Request $request)
    {
        $validated = $request->validate([
            'parent_name' => 'required|string|max:255',
            'child_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'notes' => 'nullable|string',
        ]);

        PsbRegistration::create($validated);
        
        return redirect()->route('home')->with('success', 'Pendaftaran PSB berhasil dikirim. Tim kami akan segera menghubungi Anda.');
    }
}


