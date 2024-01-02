@extends('admin.admin')

@section('title',$option->id ? "Editer une option " : "créer une option")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" method="POST" action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store',$option) }}">
        @csrf
        @method($option->exists ? 'PUT' :'POST')
        <div class="row">
            @include('shared.input',['class'=>'col','label'=>'Nom','name'=>'name','value'=>$option->name])
        <div>
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
