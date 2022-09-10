<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortLinks;
use App\Admin;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $shortLinks = ShortLinks::where('user_id', Auth::id())->latest()->paginate(10);
        $admin = Admin::all()->first();
        return view('home', compact('shortLinks', 'admin'));
    }
}
