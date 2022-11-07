<?php

namespace App\Http\Controllers;

use App\Models\ShortCode;
use Illuminate\Http\Request;

class ShortCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortCode= ShortCode::all();
        return view("short_codes.index",['shortCode'=>$shortCode]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('short_codes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shortCode = new shortCode();
        $shortCode->shortcode = $request->shortcode;
        $shortCode->replace = $request->replace;

        $shortCode->save();

        return redirect()->route('short_codes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShortCode  $shortCode
     * @return \Illuminate\Http\Response
     */
    public function show(ShortCode $shortCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShortCode  $shortCode
     * @return \Illuminate\Http\Response
     */
    public function edit(ShortCode $shortCode)
    {

        return view('short_codes.update', ['shortCode'=>$shortCode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShortCode  $shortCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShortCode $shortCode)
    {
        $shortCode->shortcode = $request->shortcode;
        $shortCode->replace = $request->replace;

        $shortCode->save();

        return redirect()->route('short_codes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShortCode  $shortCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShortCode $shortCode)
    {
        $shortCode->delete();
        return redirect()->route('short_codes.index');
    }
}
