<?php

namespace App\Http\Controllers;
use App\UsersProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager as Image;

class UsersProfileController extends Controller
{
    
    public function show()
    {
        return view('profile.show');
    }
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'address'       => 'required',
            'zipcode'       => 'required',
            'city'          => 'required',
            'lastname'      => 'required',
            'firstname'     => 'required',
            'gender'        => 'required',
            'phone'         => 'required',
            'date_of_birth' => 'required',
        ]);
        $UserProfile = Auth::user()->profile;
        $UserProfile->address = $request->input('address');
        $UserProfile->zipcode = $request->input('zipcode');
        $UserProfile->city = $request->input('city');
        $UserProfile->lastname = $request->input('lastname');
        $UserProfile->firstname = $request->input('firstname');
        $UserProfile->gender = $request->input('gender');
        $UserProfile->phone = $request->input('phone');
        $UserProfile->date_of_birth = $request->input('date_of_birth');
        $UserProfile->save();


        return redirect('/profile');
    }


    public function updatePicture(Request $request)
    {
        
        $manager = new Image();
            $image = $request->pic;
            $path = '/storage/avatar/' . uniqid('img_') . '.jpg';

            
        $manager
            ->make($image)
            ->orientate()
            ->fit(100,100)
            ->save(public_path($path));

        Auth::user()->profile->update([ 'pic_path' => $path]);

        
        
        return redirect('/profile/edit');
    }
}
