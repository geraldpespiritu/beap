<?php

namespace App\Http\Controllers;

use App\Illustration;
use Illuminate\Http\Request;

class ExitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exits  = Exit::orderBy('created_at', 'desc')->paginate(10);
        return view('exits.index')->with('exits', $exits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exits.create');
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
            'illustrationName' => 'required',
            'illustrationDescription' => 'required',
            'illustrationImage' => 'image|max:1999',
            'illustrationImage' => 'required',
        ]);

        $filename = $request->file('illustrationImage')->getClientOriginalName();
        $moveImage = $request->file('illustrationImage')->move('storage/illustration_images', $filename);

        // Create Post
        $illustration = new Illustration;
        $illustration->illustrationName = $request->input('illustrationName');
        $illustration->illustrationDescription = $request->input ('illustrationDescription');
        $illustration->user_id = auth()->user()->id;
        $illustration->illustrationImage = $filename;
        $illustration->save();

        return redirect('/illustrations')->with('success', 'Illustration Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($illustrationID)
    {
        $illustration = Illustration::find($illustrationID);
        return view('illustrations.show')->with('illustration', $illustration);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($illustrationID)
    {
        $illustration = Illustration::find($illustrationID);

        // Check for correct user
        if(auth()->user()->id !== $illustration->user_id){
            return redirect('/illustrations')->with('error', 'Unauthorized Page');
        }

        return view('illustrations.edit')->with('illustration', $illustration);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $illustrationID)
    {
        $this->validate($request, [
            'illustrationName' => 'required',
            'illustrationDescription' => 'required',
            'illustrationImage' => 'image|max:1999',
            'illustrationImage' => 'required',
        ]);

        $filename = $request->file('illustrationImage')->getClientOriginalName();
        $moveImage = $request->file('illustrationImage')->move('storage/illustration_images', $filename);

        $illustration = Illustration::find($illustrationID);
        $illustration->illustrationName = $request->input('illustrationName');
        $illustration->illustrationDescription = $request->input ('illustrationDescription');
        if($request->hasFile('illustrationImage')){
            $illustration->illustrationImage = $filename;
        }
        $illustration->save();

        return redirect('/illustrations')->with('success', 'Illustration Modified');
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
