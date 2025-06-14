<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function create()
{
    return view('tickets.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string|max:100',
        'message' => 'required|string',
        'attachment' => 'nullable|file|max:2048',
    ]);

    // ذخیره‌سازی فایل در صورت وجود
    $path = $request->file('attachment')?->store('attachments', 'public');

        Ticket::create([
        'user_id' => auth()->id(),
        'title' => $request->title,
        'category' => $request->category,
        'message' => $request->message,
        'attachment_path' => $path,
    ]);

    return back()->with('success', 'تیکت شما با موفقیت ثبت شد.');
}
}
