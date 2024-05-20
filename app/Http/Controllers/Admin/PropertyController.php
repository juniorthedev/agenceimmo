<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Option;
use App\Http\Requests\Admin\PropertyFormRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $property = new  Property();
        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'price' => 200,
            'floor' => 0,
            'city' => 'Cotonou',
            'address' => 'Abomey-Calavi',
            'postal_code' => '00229',
            'sold' => false,
        ]);
        $options = Option::pluck('name', 'id');
        return view('admin.properties.form', [
            'property' => $property,
            'options' => $options,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        //
        $property =  Property::create($request->validated());
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'Le bien a  été ajouté');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
        return view("admin.properties.form", [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        //
        $property->options()->sync($request->validated('options'));
        $property->update($request->validated());
        return to_route('admin.property.index')->with('success', 'Le bien a  été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //

        if ($property) {
            $property->delete();
            return redirect()->route('admin.property.index')->with('success', 'Le bien a été supprimé');
        } else {
            return redirect()->back();
        }
    }
}
