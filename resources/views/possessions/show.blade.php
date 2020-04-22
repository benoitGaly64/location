@extends('layouts.app')

@section('content')

    <h1>{{$possession->title}}</h1>
    
        <div>
            <p>description : {!!$possession->description!!}</p>
            <p>address : {!!$possession->address!!}</p>
            <p>zipcode : {!!$possession->zipCode!!}</p>
            <p>town : {!!$possession->town!!}</p>
            <p>id_owner : {!!$possession->id_owner!!}</p>
            <p>type : {!!$possession->type!!}</p>
        </div>     
        <a href="/possessions/{{$possession->id}}/edit" class="btn btn-lg btn-primary" style="margin-bottom:15px;"> Editer l'article</a>

        
@endsection