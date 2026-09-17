<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\News;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = request()->user();
        $notifications = News::where('status', 'published')->latest()->take(5)->get();
        $latestNews = $notifications->take(3);
        $emails = $user->role === 'admin' ? Contact::latest()->take(5)->get() : collect();

        return view('dashboard', compact('notifications', 'emails', 'latestNews'));
    }
}