@extends('layouts.app')

@section('content')

<h1>Créer un bien</h1>

{!! Form::open(['action' => 'PossessionsController@store', 'method' => 'POST']) !!}
   <div class="form-group">
        {{Form::label('title', 'Titre')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titre'])}}
   </div>
   <div class="form-group">
    {{Form::label('description', 'description')}}
    {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Le contenu de votre description'])}}

    {{Form::label('address', 'address')}}
    {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'adresse du bien'])}}

    {{Form::label('Code Postal', 'Code postal')}}
    {{Form::text('zipCode', '', ['class' => 'form-control', 'placeholder' => 'Code postal'])}}
    
    {{Form::label('Ville', 'Ville')}}
    {!! Form::text('town', '', ['class' => 'form-control', 'placeholder' => 'Ville']) !!}
    
    

    {{Form::hidden('portfolio', $_GET['pf'], ['class' => 'form-control', 'placeholder' => 'portfolio'])}}
    
    </div>
    {!! Form::submit('Creer votre bien', ['class' => 'btn btn-lg btn-primary']) !!}
    
 {!! Form::close() !!}


@endsection