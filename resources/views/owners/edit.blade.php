@extends('layouts.app')

@section('content')

<p>edit</p>
<h1>Mettre a jour le bien</h1>
    {!! Form::open(['action' => ['OwnerController@update', $owner->id], 'method' => 'POST']) !!}
       <div class="form-group">
            {{Form::label('gender', 'Genre')}}
            {{Form::text('gender', $owner->gender, ['class' => 'form-control', 'placeholder' => 'gender'])}}
       </div>
       <div class="form-group">
        {{Form::label('lastname', 'Nom de famille')}}
        {{Form::textarea('lastname', $owner->lastname, ['class' => 'form-control', 'placeholder' => 'Nom de famille'])}}
        </div>
        <div class="form-group">
          {{Form::label('firstname', 'Prénom')}}
          {{Form::text('firstname', $owner->firstname, ['class' => 'form-control', 'placeholder' => 'firstname'])}}
     </div>
     <div class="form-group">
          {{Form::label('email', 'Email')}}
          {{Form::text('email', $owner->email, ['class' => 'form-control', 'placeholder' => 'email'])}}
     </div>
     <div class="form-group">
          {{Form::label('address', 'Adresse')}}
          {{Form::text('address', $owner->address, ['class' => 'form-control', 'placeholder' => 'address'])}}
     </div>
     <div class="form-group">
        {{Form::label('zipcode', 'Code postal')}}
        {{Form::text('zipcode', $owner->zipcode, ['class' => 'form-control', 'placeholder' => 'zipcode'])}}
   </div>
   <div class="form-group">
    {{Form::label('city', 'Ville')}}
    {{Form::text('city', $owner->city, ['class' => 'form-control', 'placeholder' => 'city'])}}
</div>
<div class="form-group">
    {{Form::label('phone', 'Telephone')}}
    {{Form::text('phone', $owner->phone, ['class' => 'form-control', 'placeholder' => 'phone'])}}
</div>
<div class="form-group">
    {{Form::label('date_of_birth', 'Date de naissance')}}
    {{Form::text('date_of_birth', $owner->date_of_birth, ['class' => 'form-control', 'placeholder' => 'date_of_birth'])}}
</div>
     
        {{Form::hidden('_method', 'PUT')}}
        {!! Form::submit('Mettre a jour le bien', ['class' => 'btn btn-lg btn-primary']) !!}
        
     {!! Form::close() !!}
@endsection