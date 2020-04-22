@extends('layouts.app')

@section('content')
    <h1>Mettre a jour le bien</h1>
    {!! Form::open(['action' => ['PossessionsController@update', $possession->id], 'method' => 'POST']) !!}
       <div class="form-group">
            {{Form::label('title', 'Titre')}}
            {{Form::text('title', $possession->title, ['class' => 'form-control', 'placeholder' => 'Titre'])}}
       </div>
       <div class="form-group">
        {{Form::label('description', 'Contenu')}}
        {{Form::textarea('description', $possession->description, ['class' => 'form-control', 'placeholder' => 'Le contenu de votre description'])}}
        </div>
        <div class="form-group">
          {{Form::label('Adresse', 'Adresse')}}
          {{Form::text('address', $possession->address, ['class' => 'form-control', 'placeholder' => 'address'])}}
     </div>
     <div class="form-group">
          {{Form::label('zipCode', 'zipCode')}}
          {{Form::text('zipCode', $possession->zipCode, ['class' => 'form-control', 'placeholder' => 'zipCode'])}}
     </div>
     <div class="form-group">
          {{Form::label('Ville', 'Ville')}}
          {{Form::text('town', $possession->town, ['class' => 'form-control', 'placeholder' => 'town'])}}
     </div>
     <div class="form-group">
          {{Form::label('portfolio_id', 'Portefeuille immobilier')}}
          {{Form::select('portfolio_id', $portfolios, $possession->portfolio_id, ['class' => 'form-control', ''])}}
     </div>
     
        {{Form::hidden('_method', 'PUT')}}
        {!! Form::submit('Mettre a jour le bien', ['class' => 'btn btn-lg btn-primary']) !!}
        
     {!! Form::close() !!}
@endsection