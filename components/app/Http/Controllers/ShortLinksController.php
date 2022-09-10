<?php

namespace App\Http\Controllers;

use App\ShortLinks;
use App\Service;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShortLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = Auth::user()->name;
        $shortLinks = ShortLinks::where('user_id', Auth::id())->latest()->paginate(20);
        $admin = Admin::all()->first();
        // Count
        $lcount = ShortLinks::where('user_id', Auth::id())->count();
        return view('shortlinks', compact('shortLinks', 'lcount', 'username', 'admin'));
    }

    // To open the link using short links
    public function shortenLink($code)
    {
        $find = ShortLinks::where('code', $code)->first();
        $find->increment('clicks');
        return redirect($find->link);
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
        $validated = $this->validate($request, [
            'link' => 'required|url',
        ]);

        $validated['link'] = $request->link;
        $validated['code'] = Str::random(7);
        $validated['user_id'] = Auth::id();

        //store
        if (Auth::check()) {
            $validated['user_id'] = Auth::id();
            $shortlink = ShortLinks::create($validated);

            return redirect('generate-shorten-links');
        } else {
            $validated['user_id'] = 2;
            $shortlink = ShortLinks::create($validated);

            return redirect()->route('guestlink', compact('shortlink'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShortLinks  $shortLinks
     * @return \Illuminate\Http\Response
     */
    public function show(ShortLinks $shortlink)
    {
        // $shortlink = ShortLink::where('code', $shortLinks)->first();
        $lastfive = ShortLinks::latest()->take(5)->get();
        $service = Service::orderBy('updated_at', 'ASC')->get();
        return view('shortguest', compact('shortlink', 'lastfive', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShortLinks  $shortLinks
     * @return \Illuminate\Http\Response
     */
    public function edit(ShortLinks $shortLinks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShortLinks  $shortLinks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShortLinks $shortLinks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShortLinks  $shortLinks
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShortLinks $shortlinks)
    {
        $shortlinks->delete();
        return redirect()->back()->withMessage('The link has deleted successfully !');
    }
}
