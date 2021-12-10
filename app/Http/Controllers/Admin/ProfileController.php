<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $userId = auth()->user()->id;
        $currentUser = User::find($userId);
        $currentPassword = $currentUser->password;
        $currentPhoto = $currentUser->photo;
        
        if(!empty($request->input('password'))){
            $merge = [
                'password' => 'required|confirmed'
            ];
            $request->validate(User::rules($merge));
            $currentPassword = Hash::make($request->input('password'));
        }else{
            $request->validate(User::rules());
        }

        $photo = $request->file('photo') ?? null;
        $filename = null;
        if(!empty($photo)) {
            if(!empty($currentPhoto)){
                Storage::disk('public')->delete($currentPhoto);
            }

            $filename = $photo->getClientOriginalName();
            $currentPhoto = Storage::disk('public')->putFileAs('profile', $photo, $filename);
        }
        
        $currentUser->update(array_merge($request->except(['password', 'photo']),['photo' => $currentPhoto,'password' => $currentPassword]));

        return redirect()->route('profile.index')->with('status', 'Profile successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
