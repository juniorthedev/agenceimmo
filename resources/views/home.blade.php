@extends('base')

@section('content')

    <div class="bg-light p-5 text-center mt-4">
        <div class="container">
            <h1>Agence lorem ipsum</h1>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit maxime, quo corrupti quae qui adipisci modi eos earum ipsum facere laborum reprehenderit temporibus ex eveniet accusamus? Nobis ut officiis hic!
            </p>
        </div>
    </div>

    <div class="container mt-4">
        <h1>Nos derniers biens</h1>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col">
                    @include('property.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection
