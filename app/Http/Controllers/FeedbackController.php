<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the feedback (Admin only).
     */
    public function index()
    {
        $feedbacks = Feedback::with('user')->latest()->paginate(10);
        return view('admin.feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new feedback (Public/Parent).
     */
    public function create()
    {
        return view('feedback.create');
    }

    /**
     * Store a newly created feedback in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'type' => 'required|in:Saran,Kritik',
            'message' => 'required|string',
        ]);

        if (auth()->check()) {
            $validated['user_id'] = auth()->id();
        }

        Feedback::create($validated);

        return redirect()->back()->with('success', 'Terima kasih atas saran dan kritik Anda. Pesan Anda telah kami terima.');
    }

    /**
     * Mark feedback as read (Admin only).
     */
    public function markAsRead(Feedback $feedback)
    {
        $feedback->update(['is_read' => true]);
        return redirect()->back()->with('success', 'Pesan ditandai sebagai sudah dibaca.');
    }

    /**
     * Remove the specified feedback (Admin only).
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->back()->with('success', 'Pesan berhasil dihapus.');
    }
}
