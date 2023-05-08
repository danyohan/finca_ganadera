<?php

namespace App\Http\Controllers;

use App\Interfaces\GenericInterface;
use App\Models\Paddock;
use Illuminate\Http\Request;

class PaddocksController extends Controller
{

    private $genericInterface;
    private const VIEW = '/paddocks';

    public function __construct(GenericInterface $genericInterface)
    {
        $this->genericInterface = $genericInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paddock = $this->genericInterface->getData();
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
        $paddockArray = $request->only([
            'name',
            'size',
            'animal_number'
        ]);

        $this->genericInterface->create($paddockArray);
        return redirect(self::VIEW);
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
        $paddock = $this->genericInterface->getById($id);
        return view('paddocks.edit')->with('paddock', $paddock);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paddock $paddock)
    {

        $paddockArray = $request->only([
            'name',
            'size',
            'animal_number'
        ]);

        $this->genericInterface->update($paddockArray, $paddock);

        return  redirect(self::VIEW);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->genericInterface->delete($id);

        return redirect(self::VIEW);
    }
}
