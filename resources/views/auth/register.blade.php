
@extends('base')
@section('title', "S'inscrire")
@section('content')
<div class="mt-4 container">
    <div class="row col-6  offset-3">
        <h1 class="my-4">@yield( 'title' )</h1>
    @include('shared.flash')
    <form action="{{ route('register') }}" method="post" class="vstack gap-3">
        @csrf
        @include('shared.input', ['type' => 'text', 'name' => 'lastname', 'label' => 'Nom', 'class' => 'col'])
        @include('shared.input', ['type' => 'text', 'name' => 'firstname', 'label' => 'Prenom', 'class' => 'col'])
        @include('shared.input', ['type' => 'email', 'name' => 'email', 'label' => 'Email', 'class' => 'col'])
        @include('shared.input', ['type' => 'password', 'name' => 'password', 'label' => 'Mot de passe', 'class' => 'col'])
        <div class="mt-2">
            <button class="btn btn-primary" type="submit">S'inscrire</button>
        </div>
    </form>
    </div>
</div>
@endsection
