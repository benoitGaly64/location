@extends('layouts.app')

@section('content')

<br />

<a href="/possessions/createportfolio" class="btn btn-primary">Creer un portefeuille immobilier</a>

@foreach(Auth::user()->portfolios as $portfolio)
    <div class="container p-2">

        <a class="link-unstyled" data-toggle="collapse" href="#collapse{{ $portfolio->id }}" role="button"
            aria-expanded="false" aria-controls="collapse{{ $portfolio->id }}">
            <h1>{{ $portfolio->name }}</h1>
        </a>
        <div class="collapse" id="collapse{{ $portfolio->id }}">
            <a href="/possessions/create?pf={{ $portfolio->id }}" class="btn btn-lg btn-primary" style="margin-bottom:15px;">Ajouter un bien au portefeuille</a>
            @if(count($portfolio->possessions) >= 1)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Titre</th>
                            <th scope="col">Desciption</th>
                            <th scope="col">Editer</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($portfolio->possessions->sortBy('name') as $possession)
                            <a class="link-unstyled" data-toggle="collapse" href="#collapse{{ $possession->id }}"
                                role="button" aria-expanded="false" aria-controls="collapse{{ $possession->id }}">

                                <tr>
                                    <td><a class=""
                                            href="/possessions/{{ $possession->id }}/show">{{ $possession->title }}</a>
                                    </td>
                                    <td>{!!$possession->description!!}</td>
                                    <td><a href="/possessions/{{ $possession->id }}/edit" class="btn btn-warning">Editer</a></td>
                                    <td>
                                        <form action="{{ url('/possessions', ['id' => $possession->id]) }}" method="post">
                                            <input class="btn btn-danger" type="submit" value="Delete" />
                                            <input type="hidden" name="_method" value="delete" />
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </td>

                                </tr>
                        @endforeach
                    </tbody>
                </table>
                <br />
            @else
                <p>Aucun bien dans ce porte feuille. </p>
            @endif
        </div>
    </div>
    <hr>
@endforeach

</div>

@endsection
