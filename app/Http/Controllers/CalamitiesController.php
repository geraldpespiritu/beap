<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calamity;
use DB;

class CalamitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calamities  = Calamity::orderBy('created_at', 'desc')->paginate(10);
        return view('calamities.index')->with('calamities', $calamities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calamities.create');

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
            'name' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'image' => 'image|max:1999',
            'image' => 'required',
            'api_token' => str_random(60),
        ]);

     /*   // Handle File Upload
        if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload image
            $path = $request->file('image')->storeAs('public/calamity_images', $fileNameToStore);
        } else{
            $fileNameToStore = 'noimage.jpg';
        }*/



        $filename = $request->file('image')->getClientOriginalName();
        $moveImage = $request->file('image')->move('storage/calamity_images', $filename);

        // Create Calamity
        $calamity = new Calamity;
        $calamity->name = $request->input('name');
        $calamity->description = $request->input ('description');
        $calamity->priority = $request->input ('priority');
        $calamity->user_id = auth()->user()->id;
        $calamity->image = $filename;
        $calamity->api_token = str_random(60);
        $calamity->save();

        return redirect('/calamities')->with('success', 'Calamity Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($calamityID)
    {
        $calamity = Calamity::find($calamityID);
        return view('calamities.show')->with('calamity', $calamity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($calamityID)
    {
        $calamity = Calamity::find($calamityID);

        // Check for correct user
        if(auth()->user()->id !== $calamity->user_id){
            return redirect('/calamities')->with('error', 'Unauthorized Page');
        }

        return view('calamities.edit')->with('calamity', $calamity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $calamityID)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'priority' => 'required',
            'image' => 'image|max:1999',
            'image' => 'required',
        ]);


        $filename = $request->file('image')->getClientOriginalName();
        $moveImage = $request->file('image')->move('storage/calamity_images', $filename);

        $calamity = Calamity::find($calamityID);
        $calamity->name = $request->input('name');
        $calamity->description = $request->input ('description');
        $calamity->priority = $request->input ('priority');
        if($request->hasFile('image')){
            $calamity->image = $filename;
        }
        $calamity->save();

        return redirect('/calamities')->with('success', 'Calamity Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($calamityID)
    {
        $calamity = Calamity::find($calamityID);

        // Check for correct user
        if(auth()->user()->id !== $calamity->user_id){
            return redirect('/calamities')->with('error', 'Unauthorized Page');
        }

        $calamity->delete();
        return redirect('/calamities')->with('success', 'Post Removed');
    }
}
