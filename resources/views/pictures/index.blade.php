@extends('admin.admin')

@section('title', 'Ajouter une ou plusieurs images')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">@yield('title')</h3>
        <h5 class="mb-4 fw-bold">{{ $property->title }}</h5>
        @include('shared.flash')
        <form method="POST" action="{{ route('admin.property.addPicture', $property) }}" enctype="multipart/form-data" class="vstack gap-3">
            @csrf

            <div class="row">
                <div class="col my-4">
                    <label for="">Choose Images</label>
                    <input type="file" name="images[]" multiple class="form-control">
                    @error('images')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="hidden" name="property_id" value="{{ $property->id }}">
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Ajouter</button>
        </form>
    </div>
@endsection
