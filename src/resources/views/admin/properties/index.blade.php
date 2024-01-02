@extends('admin.admin')
@section('title','Tous les biens')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1> @yield('title') </h1>
    <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Ajouter bien</a>
</div>

    <table class="table table-striped" aria-describedby="mydesc">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Ville</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $propertie)
                <tr>
                   <td> {{ $propertie->title }}</td>
                    <td>{{ $propertie->surface }}m²</td>
                    <td>{{ number_format($propertie->price ,thousands_separator :' ')}}</td>
                    <td>{{ $propertie->city }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.property.edit',$propertie) }}" class="btn btn-primary">Editer</a>

                            <form action="{{ route('admin.property.destroy',$propertie->id) }}" method="POST">
                                @csrf
                                @method("delete")

                                <button class="btn btn-danger" >Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $properties->links() }}
@endsection
