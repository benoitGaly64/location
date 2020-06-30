@extends('layouts.app')

@section('content')

<p>index</p>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Owners</th>
            @can('edit owner')<th scope="col">Editer</th> @endcan
            @can('delete owner')<th scope="col">Supprimer</th> @endcan
        </tr>
    </thead>
    <tbody>
        @foreach ($owners as $owner)
        <tr>
            <td><a class=""
                href="/owners/{{ $owner->id }}/show"><strong>{{ $owner->lastname}}</strong> {{$owner->firstname}}</a></td>
            @can('edit owner')
                <td><a href="/owners/{{ $owner->id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a></td>
             @endcan
            @can('delete owner')
                <td>
                    <form action="{{ url('/owners', ['id' => $owner->id]) }}" method="post">
                        <input class="btn btn-danger" type="submit" value="Delete" />
                        <input type="hidden" name="_method" value="delete" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </td>
            @endcan
        </tr>
        @endforeach
    </tbody>
</table>
@endsection