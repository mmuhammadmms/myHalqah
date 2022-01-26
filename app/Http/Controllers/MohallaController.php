<?php

namespace App\Http\Controllers;

use App\Http\Requests\MohallaRequest;
use App\Models\Halqah;
use App\Models\Mohalla;
use Illuminate\Http\Request;

class MohallaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mohallas = Mohalla::all();
        return view('mohallas.index', compact('mohallas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $halqahs = Halqah::all();
        return view('mohallas.create',compact('halqahs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MohallaRequest $request)
    {
        Mohalla::create($request->validated());
        return redirect()->route('mohallas.index')->with('message','Mohalla Created Successfully.');
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
    public function edit(Mohalla $mohalla)
    {
        $halqahs = Halqah::all();
        return view('mohallas.edit',compact('mohalla','halqahs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MohallaRequest $request, Mohalla $mohalla)
    {
        $mohalla->update($request->validated());
        return redirect()->route('mohallas.index')->with('message','Mohalla Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mohalla $mohalla)
    {
        $mohalla->delete();
        return redirect()->route('mohallas.index')->with('message','Mohalla Deleted Successfully.');
    }
}
