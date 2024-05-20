@extends('base')

@section('title', $property->title)
@section('content')
    <div class="container my-4">
        <h1>{{ $property->title }}</h1>
        <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m<sup>2</sup></h2>

        <div class="text-primary fw-bold" style="font-size: 4rem">
            {{ number_format($property->price, thousands_separator: ' ') }} €
        </div>

        <hr>
        <div class="mt-4">
            <h4>Interéssé par ce bien ?</h4>
            @include('shared.flash')
            <form action="{{ route('property.contact', $property) }}" class="vstack gap-3" method="post">
                @csrf
                <div class="row">
                    @include('shared.input', ['class' => 'col', 'label'=>'Prénom', 'name'=>'firstname'])
                    @include('shared.input', ['class' => 'col', 'label'=>'Nom', 'name'=>'lastname'])
                </div>
                <div class="row">
                    @include('shared.input', ['class' => 'col', 'label'=>'Téléphone', 'name'=>'phone'])
                    @include('shared.input', ['type' => 'email', 'class' => 'col', 'label'=>'Email', 'name'=>'email'])
                </div>
                @include('shared.input', ['type' => 'textarea', 'class' => 'col', 'label'=>'Votre message', 'name'=>'message'])

                <div class="mt-4">
                    <button class="btn btn-primary">Nous contacter</button>
                </div>
            </form>
        </div>

        <div class="mt-4">
            <p>
                {!! nl2br($property->description) !!}
            </p>
            <div class="row mt-2">
                <div class="col-8">
                    <h2>Caractéristiques</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }} m<sup>2</sup></td>
                        </tr>
                        <tr>
                            <td>Nombre de pièces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Nombre de chambres</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Nombre d'étages</td>
                            <td>{{ $property->floor ?: 'Rez de chaussé' }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>{{ $property->address ?: '' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2>Spécificités</h2>
                    <ul class="list-group">
                        @forelse ($property->options as $option)
                            <li class="list-group-item ">{{ $option->name }}</li>
                        @empty
                            Aucune spécification disponible.
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
