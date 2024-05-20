<?php

namespace App\Http\Controllers;

use App\Http\Requests\PictureFormRequest;
use App\Models\Picture;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PictureController extends Controller
{
    //
    public function create(Property $property): View {
        return view('pictures.index', compact('property'));
    }

    public function addPicture(Request $request, Property $property)
    {
        foreach ($request->file('images') as $imagefile) {
            $imagepath = $imagefile->store('img','public');
            Picture::create([
                'path' => $imagepath,
                'property_id' => $property->id,
            ]);
        }

        return back()->with('success', 'Images uploaded successfully!');
    }
}
