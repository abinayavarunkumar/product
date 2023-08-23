<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\UnitType;
use App\Http\Requests\UnitTypeRequest;

class UnitTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $unittypes= UnitType::all();
        return view('unittypes.index', ['unittypes'=>$unittypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('unittypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UnitTypeRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UnitTypeRequest $request)
    {
        $unittype = new UnitType;
		$unittype->name = $request->input('name');
        $unittype->save();

        return to_route('unittypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $unittype = UnitType::findOrFail($id);
        return view('unittypes.show',['unittype'=>$unittype]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $unittype = UnitType::findOrFail($id);
        return view('unittypes.edit',['unittype'=>$unittype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UnitTypeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UnitTypeRequest $request, $id)
    {
        $unittype = UnitType::findOrFail($id);
		$unittype->name = $request->input('name');
        $unittype->save();

        return to_route('unittypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $unittype = UnitType::findOrFail($id);
        $unittype->delete();

        return to_route('unittypes.index');
    }
}
