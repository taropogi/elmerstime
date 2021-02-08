<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Mail\PhotoApproved;
use App\Mail\PhotoDenied;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    public function __construct()
    {

        $this->middleware([
            'auth',
            'is_admin'
        ]);
    }
    public function index()
    {
        $data = [
            'photos' => Photo::get(),
        ];
        return view('admin.index', $data);
    }

    public function denyPhoto(Photo $photo)
    {
        $photo->approved = 0;
        $photo->evaluated = 1;
        $photo->save();

        Mail::to('taropogi_123@yahoo.com')->send(new PhotoDenied());


        return back();
    }

    public function approvePhoto(Photo $photo)
    {
        $photo->approved = 1;
        $photo->evaluated = 1;
        $photo->save();

        Mail::to('taropogi_123@yahoo.com')->send(new PhotoApproved());


        return back();
    }
}
