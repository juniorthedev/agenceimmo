@extends('base')
@section('title', 'Tous nos biens')

@section('content')
    <div class="bg-light p-5 text-center">
        <form action="" class="container d-flex gap-2">
            @csrf
            <input type="number" value="{{ $input['surface'] ?? '' }}" class="form-control" name="surface" placeholder="Surface minimum">
            <input type="number" value="{{ $input['rooms'] ?? '' }}" class="form-control" name="rooms" placeholder="Nombre de pièces min">
            <input type="number" value="{{ $input['price'] ?? '' }}" class="form-control" name="price" placeholder="Budget max">
            <input type="text" value="{{ $input['title'] ?? '' }}" class="form-control" name="title" placeholder="Mot clé">
            <button class="btn btn-sm btn-primary flex-grow-0">Rechercher</button>
        </form>
    </div>
    <div class="container mt-4">
        <div class="row mb-4">
            @forelse ($properties as $property)
                <div class="col-3">
                    @include('property.card')
                </div>
            @empty
                <div class="col">
                    Aucun bien ne correspond à la recherche
                </div>
            @endforelse
        </div>
    </div>
    <div class="container my-4">
        {{ $properties->links() }}
    </div>
@endsection
