<?php

namespace App\Http\Controllers;

use App\Http\Requests\HalqahRequest;
use App\Models\Halqah;
use App\Models\Zone;
use Illuminate\Http\Request;

class HalqahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halqahs = Halqah::all();
        return view('halqahs.index',compact('halqahs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = Zone::all();
        return view('halqahs.create',compact('zones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HalqahRequest $request)
    {
        Halqah::create($request->validated());
        return redirect()->route('halqahs.index')->with('message','Halqah Created Successfully.');
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
    public function edit(Halqah $halqah)
    {
        $zones = Zone::all();
        return view('halqahs.edit',compact('halqah','zones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HalqahRequest $request, Halqah $halqah)
    {
        $halqah->update($request->validated());
        return redirect()->route('halqahs.index')->with('message','Halqah Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Halqah $halqah)
    {
        $halqah->delete();
        return redirect()->route('halqahs.index')->with('message','Halqah Deleted Successfully.');
    }
}
