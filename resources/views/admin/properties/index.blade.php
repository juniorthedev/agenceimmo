@extends('admin.admin')

@section('title', 'Tous les biens')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Ajouter un bien</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Ville</th>
                <th>Vendu</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->surface }} m<sup>2</sup></td>
                    <td>{{ number_format($property->price, 0, '', ',') }}</td>
                    <td>{{ $property->city }}</td>
                    <td>@if($property->sold) Oui @else Non @endif</td>
                    <td>
                        <div class="d-flex justify-content-end gap-1">
                            <a href="{{ route('admin.property.edit', $property) }}" class="btn btn-sm btn-success">Modifier</a>
                            <form action="{{ route('admin.property.destroy', $property) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                            </form>
                            <a href="{{ route('admin.property.upload', $property) }}" class="btn btn-sm btn-secondary">Ajouter des photos</a>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{ $properties->links() }}
@endsection
