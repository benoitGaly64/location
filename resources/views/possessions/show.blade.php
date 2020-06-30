@extends('layouts.app')

@section('content')

<h1>{{ $possession->title }}</h1>

<div>
    <p>description : {!!$possession->description!!}</p>
    <p>address : {!!$possession->address!!}</p>
    <p>zipcode : {!!$possession->zipCode!!}</p>
    <p>town : {!!$possession->town!!}</p>
    <p>id_owner : {!!$possession->id_owner!!}</p>
    <p>type : {!!$possession->type!!}</p>

</div>
<div>
    <table>
        <thead>
            <th><h1> Proprietaires</h1></th>
            <th><h1>Non Proprietaires</h1></th>
        </thead>
        <tbody>
            <tr>
                <td>    
                    <ol id="CurrentOwners" data-draggable="target">
                    @foreach($panddingItem as $item)
                        <li data-draggable="item" id="{{$item->id}}" data-owner="{{$item->id}}" data-possession="{{ $possession->id }}" data-isowner="true">{{ $item->lastname }} {{ $item->firstname }}</li>
                    @endforeach
                    </ol>
                </td>
                <td>
                    <ol id="NotOwners" data-draggable="target">
                        @foreach($completeItem as $item)
                            <li data-draggable="item" data-owner="{{$item->id}}" data-possession="{{ $possession->id }}" data-isowner="false">{{ $item->lastname }} {{ $item->firstname }}</li>
                        @endforeach
                    </ol>
                </td>
            </tr>
        </tbody>
    </table>
    
</div>
<div class="clear">
    @can('edit possessions')
        <a href="/possessions/{{ $possession->id }}/edit" class="btn btn-lg btn-primary" style="margin-bottom:15px;">
            Editer l'article</a>
    @endcan
</div>

<script language="JavaScript" type="text/javascript" src="{{ asset('js/draggable.js') }}" defer></script>
@endsection
