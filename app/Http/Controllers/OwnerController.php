<?php

namespace App\Http\Controllers;

use App\owner;
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
        $owners = owner::all();
        return view('owners.index',compact('owners'));
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
    public function store(request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'zipCode' => 'required|integer',
            'town' => 'required',
            'portfolio' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $owner = owner::find($id);
            return view('owners.show')->with('owner', $owner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner = owner::find($id);
        return view('owners.edit',compact('owner'));
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
            'gender' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'date_of_birth' => 'required',
        ]);
            
        $owner = owner::find($id);
        $owner->gender = $request->input('gender');
        $owner->lastname = $request->input('lastname');
        $owner->firstname = $request->input('firstname');
        $owner->email = $request->input('email');
        $owner->address = $request->input('address');
        $owner->zipcode = $request->input('zipcode');
        $owner->city = $request->input('city');
        $owner->phone = $request->input('phone');
        $owner->date_of_birth = $request->input('date_of_birth');
        $owner->save();
        return redirect('/owners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $owner = owner::find($id);
        $owner->delete();
        return redirect('/owners');
    }
}
