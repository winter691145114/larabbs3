<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()->notifications()->paginate(20);
        Auth::user()->markAsRead();
        return view('notifications.index',compact('notifications'));
    }
}
