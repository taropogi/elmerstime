<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Mail\PhotoDenied;
use App\Mail\PhotoApproved;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
            'photos' => Photo::where('evaluated', false)->get(),
        ];
        return view('admin.index', $data);
    }

    public function denyPhoto(Photo $photo)
    {
        $photo->deny();

        Mail::to($photo->user->email)->send(new PhotoDenied());


        return back();
    }

    public function approvePhoto(Photo $photo)
    {
        $photo->approve();

        Mail::to($photo->user->email)->send(new PhotoApproved());


        return back();
    }
}
