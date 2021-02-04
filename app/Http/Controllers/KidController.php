<?php

namespace App\Http\Controllers;

use App\Models\Kid;
use Illuminate\Http\Request;

class KidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['kids'] = auth()->user()->kids;
        return view('kid.index', $data);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('kid.create');
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
            'first_name' => 'required',
            'last_name' => 'required',
            'relationship' => 'required',
        ]);

        $request->user()->kids()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'kid_relationship' => $request->relationship
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kid  $kid
     * @return \Illuminate\Http\Response
     */
    public function show(Kid $kid)
    {
        $data['kid'] = $kid;
        return view('kid.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kid  $kid
     * @return \Illuminate\Http\Response
     */
    public function edit(Kid $kid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kid  $kid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kid $kid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kid  $kid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kid $kid)
    {
        //
    }
}
