<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\NewIllustration;
use App\Http\Resources\NewIllustration as NewIllustrationResource;



class NewIllustrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get illustrations
        $illustrations = NewIllustration::paginate(15);

        //Return collection of illustrations as a resource
        return NewIllustrationResource::collection($illustrations);
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
        $illustration = $request->isMethod('put') ? NewIllustration::findOrFail
        ($request->illustration_id) : new NewIllustration;

        $illustration->id = $request->input('illustration_id');
        $illustration->illName = $request->input('illName');
        $illustration->illDesc = $request->input('illDesc');

        if($illustration->save()) {
          return new NewIllustrationResource($illustration);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get illustration
        $illustration = NewIllustration::findOrFail($id);

        // Return single illustration as a resource
        return new NewIllustrationResource($illustration);
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
        // Get illustration
        $illustration = NewIllustration::findOrFail($id);

        if($illustration->delete()){
        return new NewIllustrationResource($illustration);
        }
    }
}
