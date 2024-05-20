@extends('admin.admin')

@section('title', $property->exists ? 'Modifier un bien' : 'Ajouter un bien')

@section('content')
    <h1 class="mb-4">@yield('title')</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }} " method="POST">
        @csrf
        @method($property->exists ? 'put' : 'post')

        <div class="row my-2">
            @include('shared.input', ['class' => 'col', 'label'=>'Titre', 'name'=>'title', 'value' => $property->title])

            <div class="col row">
                @include('shared.input', ['class' => 'col', 'label'=>'Surface', 'name'=>'surface', 'value' => $property->surface])
                @include('shared.input', ['class' => 'col', 'label'=>'Prix', 'name'=>'price', 'value' => $property->price])
            </div>

        </div>
        @include('shared.input', ['type' => 'textarea', 'label'=>'Description', 'name'=>'description', 'value' => trim($property->description, ' ')])

        <div class="row mt-2">
            @include('shared.input', ['class' => 'col', 'label'=>'Pièce', 'name'=>'rooms', 'value' => $property->rooms])
            @include('shared.input', ['class' => 'col', 'label'=>'Chambres', 'name'=>'bedrooms', 'value' => $property->bedrooms])
            @include('shared.input', ['class' => 'col', 'label'=>'Etage', 'name'=>'floor', 'value' => $property->floor])
        </div>
        <div class="row mt-2">
            @include('shared.input', ['class' => 'col', 'label'=>'Ville', 'name'=>'city', 'value' => $property->city])
            @include('shared.input', ['class' => 'col', 'label'=>'Adresse', 'name'=>'address', 'value' => $property->address])
            @include('shared.input', ['class' => 'col', 'label'=>'Code postal', 'name'=>'postal_code', 'value' => $property->postal_code])
        </div>
        <div class="my-2">
            @include('shared.select', ['label' => 'Options', 'name'=>'options', 'value' => $property->options()->pluck('id'), 'multiple' => true, 'options' => $options] )
            @include('shared.checkbox', ['label'=>'Vendu', 'name'=>'sold', 'value' => $property->sold])
        </div>

        <div class="mt-2">
            <button class="btn btn-primary">
                @if ($property->exists)
                    Modifier
                @else
                    Ajouter
                @endif
            </button>
        </div>
    </form>
@endsection
