@extends('admin.admin')

@section('title',$property->id ? "Editer un bien" : "créer un bien")

@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" method="POST" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store',$property) }}">
        @csrf
        @method($property->exists ? 'PUT' :'POST')
        <div class="row">
            @include('shared.input',['class'=>'col','label'=>'Titre','name'=>'title','value'=>$property->title])
            <div class="col row">
                @include('shared.input',['class'=>'col','label'=>'Surface','name'=>'surface','value'=>$property->surface])
                @include('shared.input',['class'=>'col','label'=>'prix','name'=>'price','value'=>$property->price])

            </div>
        </div>

        @include('shared.input',['class'=>'col','label'=>'Description','name'=>'description','type'=>'textarea','value'=>$property->description])
        <div class="row">
            @include('shared.input',['class'=>'col','label'=>'Pièces','name'=>'rooms','value'=>$property->rooms])
            @include('shared.input',['class'=>'col','label'=>'Chambres','name'=>'bedrooms','value'=>$property->bedrooms])
            @include('shared.input',['class'=>'col','label'=>'Etage','name'=>'floor','value'=>$property->floor])
        </div>

        <div class="row">
            @include('shared.input',['class'=>'col','label'=>'Adresse','name'=>'adress','value'=>$property->adress])
            @include('shared.input',['class'=>'col','label'=>'Ville','name'=>'city','value'=>$property->city])
            @include('shared.input',['class'=>'col','label'=>'Code Postal','name'=>'postal_code','value'=>$property->postal_code])
        </div>

        @include('shared.select',['label'=>'Options','name'=>'options','value'=>$property->options()->pluck('id'),'multiple'=>true,'options'=>$options])

        @include('shared.checkbox',['class'=>'col','label'=>'Vendu','name'=>'sold','value'=>$property->sold])

        <div>
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
