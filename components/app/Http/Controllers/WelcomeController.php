<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Admin;

class WelcomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('updated_at', 'ASC')->take(3)->get();
        return view('welcome', compact('services'));
    }

    public function services()
    {
        $services = Service::orderBy('Updated_at', 'ASC')->get();
        $admin = Admin::all()->first();
        return view('service', compact('services', 'admin'));
    }
}
