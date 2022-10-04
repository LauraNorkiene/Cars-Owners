<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners= Owner::all();
        return view("owners.index",['owners'=>$owners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','alpha_num','min:3', 'max:16'],
            'surname'=>['required','alpha_num','min:3', 'max:16'],
            'email'=>['required','alpha_num','min:3', 'max:16','unique:App\Models\Owner,email'],
            'phone'=>['required','alpha_num','min:3', 'max:16','unique:App\Models\Owner,phone'],
        ]);

        $owner = new Owner();
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->email = $request->email;
        $owner->phone = $request->phone;

        $owner->save();

        return redirect()->route('owners.index');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('owners.update', ['owner'=>$owner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'name'=>['required','alpha_num','min:3', 'max:16'],
            'surname'=>['required','alpha_num','min:3', 'max:16'],
            'email'=>['required','alpha_num','min:3', 'max:16','unique:App\Models\Owner,email'],
            'phone'=>['required','alpha_num','min:3', 'max:16','unique:App\Models\Owner,phone'],
        ]);
        $owner->name = $request->name;
        $owner->surname = $request->surname;
        $owner->email = $request->email;
        $owner->phone = $request->phone;
        $owner->save();
        return redirect()->route('owners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index');
    }

    public function addCar($id, Request $request) {
        $car=new Car();
        $car->reg_number=$request->reg_number;
        $car->owner_id=$id;
        $car->save();
        return redirect()->route('owners.edit',$id);

    }
}
