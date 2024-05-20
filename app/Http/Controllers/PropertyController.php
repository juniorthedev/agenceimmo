<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Requests\SearchPropertyRequest;
use App\Http\Requests\PropertyContactRequest;
use App\Mail\PropertyContactMail;
use Illuminate\Support\Facades\Mail;

class PropertyController extends Controller
{
    //
    public function index(SearchPropertyRequest  $request) {
        $query = Property::query()->orderBy('created_at', 'desc');

        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }
        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }
        if ($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $rooms);
        }
        if ($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        }
        $properties = $query->paginate(16);
        $input = $request->validated();
        return view('property.index', compact('properties', 'input'));
    }

    public function show(string $slug, Property $property) {

        $expectedSlug = $property->getSlug();
        if ($slug != $expectedSlug) {
            return to_route('property.show', ['slug' => $expectedSlug, 'property' => $property]);
        }

        return view('property.show', [
            'property' => $property
        ]);
    }

    public function contact(PropertyContactRequest $request, Property $property) {

        Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success', 'Votre demande de contact a été bien envoyée');
    }


}
