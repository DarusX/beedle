<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('banner.index')->with([
            'banners' => Banner::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'banner' => 'required',
            'expiration' => 'required|date',
            'page' => 'required|url'
        ]);
        Banner::create([
            'banner' => $request->file('banner')->store('banners'),
            'expiration' => $request->expiration,
            'page' => $request->page
        ]);
        \Session::flash('success', '');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('banner.edit')->with([
            'banner' => Banner::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'banner' => 'required',
            'expiration' => 'required|date',
            'page' => 'required|url'
        ]);
        Banner::find($id)->update([
            'banner' => $request->file('banner')->store('banners'),
            'expiration' => $request->expiration,
            'page' => $request->page
        ]);
        \Session::flash('success', '');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::destroy($id);
    }
}
