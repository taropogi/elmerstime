<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\NotifyAdminNewPhoto;
use Illuminate\Support\Facades\Mail;

class KidPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $data['user'] = $user;
        return view('kid.photo.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $image = $request->file('photo');
        $image_name = time() . '.' . $image->extension();
        $image->move(public_path('images/gallery/'), $image_name);

        $user->photos()->create([
            'file_name' => $image_name,
            'description' => $request->description,
        ]);

        $emailDetails = [
            'title' => 'New Photo Uploaded', 'body' => 'This is the phot uploaded'
        ];

        Mail::to('kutaropogi@gmail.com')->send(new NotifyAdminNewPhoto($emailDetails));
        return redirect()->route('kids', $user);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
