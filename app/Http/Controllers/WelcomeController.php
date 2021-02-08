<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        $data['photos'] = Photo::where('approved', 1)->get();
        return view('welcome.index', $data);
    }
}
