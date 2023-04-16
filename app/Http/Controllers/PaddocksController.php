<?php

namespace App\Http\Controllers;

use App\Models\Paddock;
use Illuminate\Http\Request;


class PaddocksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paddock = Paddock::paginate(10);
        return view('paddocks.index')->with('paddocks', $paddock);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paddocks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paddock = new Paddock();
        $paddock->name = $request->get('name');
        $paddock->size = $request->get('size');

        $paddock->save();

        return  redirect('/paddocks');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paddock = Paddock::find($id);
        return view('paddocks.edit')->with('paddock' , $paddock);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paddock = Paddock::find($id);
        $paddock->name = $request->get('name');
        $paddock->size = $request->get('size');

        $paddock->save();

        return  redirect('/paddocks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paddock = Paddock::find($id);
        $paddock->delete();

        return redirect('/paddocks');
    }
}
