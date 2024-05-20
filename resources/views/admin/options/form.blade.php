@extends('admin.admin')

@section('title', $option->exists ? 'Modifier une option' : 'Ajouter une option')

@section('content')
    <h1 class="mb-4">@yield('title')</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form class="vstack gap-2" action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }} " method="POST">
        @csrf
        @method($option->exists ? 'put' : 'post')

        <div class="row my-2">
            @include('shared.input', ['class' => 'col', 'label'=>'Nom', 'name'=>'name', 'value' => $option->name])

        </div>
        <div class="mt-2">
            <button class="btn btn-primary">
                @if ($option->exists)
                    Modifier
                @else
                    Ajouter
                @endif
            </button>
        </div>
    </form>
@endsection
