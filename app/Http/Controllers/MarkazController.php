<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarkazStoreRequest;
use App\Http\Requests\MarkazUpdateRequest;
use App\Models\Markaz;
use App\Models\State;
use Illuminate\Http\Request;

class MarkazController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markazs = Markaz::all();
        return view('markazs.index',compact('markazs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('markazs.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarkazStoreRequest $request)
    {
        Markaz::create($request->validated());
        return redirect()->route('markazs.index')->with('message','Markaz Created Successfully.');
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
    public function edit(Markaz $markaz)
    {
        $states = State::all();
        return view('markazs.edit' , compact('markaz','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarkazUpdateRequest $request, Markaz $markaz)
    {
        $markaz->update($request->validated());
        return redirect()->route('markazs.index')->with('message','Markaz Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Markaz $markaz)
    {
        $markaz->delete();
        return redirect()->route('markazs.index')->with('message','Markaz Deleted Successfully.');
    }
}
