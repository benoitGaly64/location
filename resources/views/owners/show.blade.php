@extends('layouts.app')

@section('content')

<p>show</p>


    <h1>{{$owner->gender}} <strong>{{$owner->lastname}}</strong> {{$owner->firstname}}</h1>
    
        <div>
            <p>email : {!!$owner->email!!}</p>
            <p>adresse : {!!$owner->address!!}</p>
            <p>Code postal : {!!$owner->zipCode!!}</p>
            <p>Ville : {!!$owner->city!!}</p>
            <p>Telephone : {!!$owner->phone!!}</p>
            <p>date de naissance : {!!$owner->date_of_birth!!}</p>
            <p>biens :</p>
            @foreach ($owner->possessions as $possession)
                <p>{{ $possession->title }}</p>
            @endforeach
        </div>
        @can('edit owner')
            <a href="/owners/{{$owner->id}}/edit" class="btn btn-lg btn-primary" style="margin-bottom:15px;"> Editer le propriétaire</a>
        @endcan

@endsection