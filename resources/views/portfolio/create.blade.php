@extends('layouts.app')

@section('content')

<h1>Créer un bien</h1>

{!! Form::open(['action' => 'PortfoliosController@store', 'method' => 'POST']) !!}
   <div class="form-group">
        {{Form::label('name', 'Nom du portefeuille de biens')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'name'])}}
   </div>
    
    </div>
    {!! Form::submit('Creer votre portefeuille', ['class' => 'btn btn-lg btn-primary']) !!}
    
 {!! Form::close() !!}


@endsection