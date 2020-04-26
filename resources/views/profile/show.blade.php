@extends('layouts.app')

@section('content')

<div>
    <p>Nom : {{ Auth::User()->profile->lastname }} {{ Auth::User()->profile->firstname }}</p>
    <p> Email : {{ Auth::User()->email }}</p>
    <p>address : {{ Auth::User()->profile->address }}</p>
    <p>zipcode : {{ Auth::User()->profile->zipcode }}</p>
    <p>city : {{ Auth::User()->profile->city }}</p>
    <p>lastname : {{ Auth::User()->profile->lastname }}</p>
    <p>firstname : {{ Auth::User()->profile->firstname }}</p>
    <p>gender : {{ Auth::User()->profile->gender }}</p>
    <p>phone Number : {{ Auth::User()->profile->phone }}</p>
    <p>date_of_birth : {{ Auth::User()->profile->date_of_birth }}</p>
    <p>pic_path : {{ Auth::User()->profile->pic_path }}</p>


</div>



@endsection
