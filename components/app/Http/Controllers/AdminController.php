<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Page;
use App\User;
use App\ShortLinks;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::latest()->get();
        $users = User::latest()->take(5)->get();
        $shorten = ShortLinks::latest()->take(5)->get();
        
        // Count
        $ucount = User::count();
        $lcount = ShortLinks::count();
        $ulcount = ShortLinks::where('user_id', '!=', '2')->count();
        $alcount = ShortLinks::where('user_id', '=', '2')->count();
        
        // Counting short links within period of days
        $day = Carbon::now()->subDays(1);
        $week = Carbon::now()->subDays(7);
        $fifteen = Carbon::now()->subDays(15);
        $amonth = Carbon::now()->subDays(60);
        $daylinks = ShortLinks::where('created_at', '>=', $day)->count();
        $weeklinks = ShortLinks::where('created_at', '>=', $week)->count();
        $fifteenlinks = ShortLinks::where('created_at', '>=', $fifteen)->count();
        $amonthlinks = ShortLinks::where('created_at', '>=', $amonth)->count();
        
        // This month count
        $this_month_mem = User::where('created_at', '>', $amonth)->count();
        $this_month_links_mem = ShortLinks::where('user_id', '!=', '2')->where('created_at', '>', $amonth)->count();
        $this_month_links_anonym = ShortLinks::where('user_id', '=', '2')->where('created_at', '>', $amonth)->count();
        $this_month_links = $this_month_links_mem + $this_month_links_anonym;

        return view('admin.dashboard', compact(
            'admin',
            'users',
            'shorten',
            'ucount',
            'lcount',
            'ulcount',
            'alcount',
            'weeklinks',
            'daylinks',
            'fifteenlinks',
            'amonthlinks',
            'this_month_mem',
            'this_month_links',
            'this_month_links_mem',
            'this_month_links_anonym'
        ));
    }

    // List all shorten links
    public function shorten()
    {
        $shorten = ShortLinks::latest()->paginate(10);
        return view('admin.shorten', compact('shorten'));
    }

    // Page for donation
    public function support()
    {
        return view('admin.support');
    }

    // List of members
    public function userlist()
    {
        $users = User::whereNotIn('id', [Auth::id(), 1, 2])->latest()->paginate(10);
        $count = User::whereNotIn('id', [2])->count();
        // if (Gate::allows('isAdmin', auth()->user())) {
        //     return view('admin.users', compact('users'));
        // }
        return view('admin.users', compact('users', 'count'));
    }

    // List staff members
    public function team()
    {
        $users = User::whereIn('role', ['admin', 'moderator'])->whereNotIn('id', [1])->paginate(10);
        $count = User::whereIn('role', ['admin', 'moderator'])->count();
        return view('admin.users_team', compact('users', 'count'));
    }

    // Appoint role to users
    public function assignrole(Request $request, User $user)
    {
        $user->role = request('role');
        $user->update();
        return redirect()->back()->withMessage($user->name . ' ' . 'is' . ' ' . Str::upper($user->role ?? 'assigned no role') . ' ' . 'now');
    }

    // Site details
    public function settings()
    {
        $admin = Admin::first();
        return view('admin.settings', compact('admin'));
    }

    // Update site settings
    public function updatesettings(Request $request, Admin $admin)
    {
        $validated = $this->validate($request, [
            'sitename' => 'sometimes|min:5',
            'sitedes' => 'sometimes|min:20',
            'col2' => 'sometimes',
            'col3' => 'sometimes',
            'col3s1' => 'sometimes',
            'col3s2' => 'sometimes',
            'col3s3' => 'sometimes',
            'facebook' => 'sometimes',
            'twitter' => 'sometimes',
            'linkedin' => 'sometimes',
            'instagram' => 'sometimes',
            'youtube' => 'sometimes',
            'toptext' => 'sometimes',
            'toplink' => 'sometimes',
            'servicedes' => 'sometimes'
        ]);

        $admin->update($validated);
        return redirect()->back()->withMessage('Site details has been updated successfully!');
    }

    // Advertise setting page
    public function advertise()
    {
        $admin = Admin::first();
        return view('admin.advertise', compact('admin'));
    }

    // Advertise update
    public function updatead(Request $request, Admin $admin)
    {
        $validated = $this->validate($request, [
            'advertise' => 'sometimes'
        ]);

        $admin->update($validated);
        return redirect()->back()->withMessage('Site ad places has been updated successfully!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function shortdelete(ShortLinks $shortlink)
    {
        $shortlink->delete();
        return redirect()->back()->withMessage('Shorten link has been deleted successfully!');
    }
}
