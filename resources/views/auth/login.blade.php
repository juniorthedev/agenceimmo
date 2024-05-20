
@extends('base')
@section('title', 'Se connecter')

@section('content')
<div class="mt-4 container">
    <div class="row">

    <div class="col-6  offset-3 ">
        <h1 class="my-4">@yield('title')</h1>
        @include('shared.flash')
        <form action="{{ route('login') }}" method="post" class="vstack gap-3">
            @csrf
            @include('shared.input', ['type' => 'email', 'name' => 'email', 'label' => 'Email', 'class' => 'col'])
            @include('shared.input', ['type' => 'password', 'name' => 'password', 'label' => 'Mot de passe', 'class' => 'col'])
            <div class="mt-4">
                <button class="btn btn-primary" type="submit" name="login">Se connecter</button>
            </div>
            <div class="mt-2">
                <a href="{{ route('register') }}" class="">S'inscrire</a>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection
