<?php

namespace App\Http\Controllers;

use App\Events\CreatedCar;
use App\Events\UpdateCar;
use App\Http\Requests\StoreCarsRequest;
use App\Http\Requests\UpdateCarsRequest;
use App\Models\Cars;
use App\Models\Owner;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Cars::orderBy('created_at', 'desc')->paginate(5);

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $owners = Owner::all();

        return view('cars.create',compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOwnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarsRequest $request)
    {

        $car = Cars::create($request->validated());

        event(new CreatedCar($car));

        return redirect()->route('cars.index')
            ->with('message', 'Se ha creado con èxito el vehiculo')
            ->with('car', $car);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Cars $car)
    {
        $history = $car->history()->orderBy('assing_date','desc')->get();

        return view('cars.show', compact('car', 'history'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Cars $car)
    {
        $owners = Owner::all();

        return view('cars.edit', compact('car','owners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOwnerRequest  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarsRequest $request, Cars $car)
    {
        $last_owner = $car->owner_id;

        $car->update($request->validated());

        event(new UpdateCar($car,$last_owner));

        return redirect()->route('cars.index')
            ->with('message', 'Se han modificado los datos con èxito')
            ->with('car', $car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cars $owner)
    {
        $owner->delete();

        return redirect()->route('cars.index')
            ->with('message', 'Propietario eliminado con èxito!');
    }
}
