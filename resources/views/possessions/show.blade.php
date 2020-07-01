@extends('layouts.app')

@section('content')

<div class="container" id="content">
    <div class="row">
                    <div class="col-md-3 blue">
                        <img src="/storage/houses/maison.png" width="250px">
                    </div>
                    <div class="col-md-8 red">
                    <div>
                        <h1>{{ $possession->title }}</h1>
                    </div>
                    <div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Informations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="false">détail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="owners-tab" data-toggle="tab" href="#owners" role="tab" aria-controls="owners" aria-selected="false">Propriétaires</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>description</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{!!$possession->description!!}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>address </label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{!!$possession->address!!} <br/>
                                                    {!!$possession->zipCode!!}, {!!$possession->town!!}</p>
        
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Type</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p>{!!$possession->type!!}</p>
                                            </div>
                                        </div>
                                        
                            </div>
                            <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Surface habitable</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Surface terrain</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Type de Chauffage</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Assainissement</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Vitrage</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Structure</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Charpente</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Couverture</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Connexions</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nombre de pieces</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Dépendances</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date création circuit électrique</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date création circuit eau</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        
                                
                            </div>
                            <div class="tab-pane fade" id="owners" role="tabpanel" aria-labelledby="owners-tab">
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
                                <script language="JavaScript" type="text/javascript" src="{{ asset('js/draggable.js') }}" defer></script>
                            </div>
                        </div>
                    </div>
                    </div>

    </div>
</div>


<!-- 
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
    
    
</div>
<div class="clear">
    @can('edit possessions')
        <a href="/possessions/{{ $possession->id }}/edit" class="btn btn-lg btn-primary" style="margin-bottom:15px;">
            Editer l'article</a>
    @endcan
</div>


-->
@endsection
