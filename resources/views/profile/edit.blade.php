@extends('layouts.app')

@section('content')
<h1>Mon profil</h1>
<hr>
<div>
    <h2>Mon Image de profil</h2>
    <div id="uploaded_image" >
    <img src="{{ Auth::User()->profile->pic_path }}" class="rounded-circle" width="100"
        height="100">
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Modifier mon avatar
    </button>
</div>
</div>

<hr>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choisir une nouvelle image de profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        <div class="form-group">
                            @csrf
                                    <div id="image-preview"></div>
                            </div>


                                <input type="file" name="upload_image" id="upload_image" />
                                <br />
                                <br />
                                <button class="btn btn-primary vanilla-rotate" data-deg="-90">Pivoter</button>
                                <button class="btn btn-success crop_image">Enregistrer</button>
                                
                                

                <br />

                <script>
                    $(document).ready(function () {

                        $image_crop = $('#image-preview').croppie({
                            enableExif: true,
                            viewport: {
                                width: 200,
                                height: 200,
                                type: 'circle'
                            },
                            enableOrientation: true,
                            boundary: {
                                width: 300,
                                height: 300
                            }
                        });
                        $(function () {
                            $('.vanilla-rotate').on('click', function (ev) {
                                $image_crop.croppie('rotate', parseInt($(this).data('deg')));
                            });
                        });
                        $('#upload_image').change(function () {
                            var reader = new FileReader();

                            reader.onload = function (event) {
                                $image_crop.croppie('bind', {
                                    url: event.target.result
                                }).then(function () {
                                    console.log('jQuery bind complete');
                                });
                            }
                            reader.readAsDataURL(this.files[0]);
                        });

                        $('.crop_image').click(function (event) {
                            $image_crop.croppie('result', {
                                type: 'canvas',
                                size: 'viewport'
                            }).then(function (response) {
                                var _token = $('input[name=_token]').val();
                                $.ajax({
                                    url: '{{ route("image_crop.upload") }}',
                                    type: 'post',
                                    data: {
                                        "image": response,
                                        _token: _token
                                    },
                                    dataType: "json",
                                    success: function (data) {
                                        var crop_image = '<img src="' + data.path +
                                            '" class="rounded-circle"';
                                        $('#uploaded_image').html(crop_image + '  width="100" height="100"/><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Modifier mon avatar</button>');
                                        $('#navbarDropdown').html(crop_image + ' width="40" height="40"/>');
                                        $('#exampleModal').modal('hide');
                                    }
                                });
                            });
                        });

                    });

                </script>






            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


            </div>
        </div>
    </div>
</div>


{!! Form::open(array('action' => 'UsersProfileController@update', 'method' => 'POST')) !!}

<div class="form-group">
    {{ Form::label('address', 'Adresse *') }}
    {{ Form::text('address', Auth::User()->profile->address, ['class' => 'form-control', 'placeholder' => 'address']) }}
</div>

<div class="form-group">
    {{ Form::label('zipcode', 'Code postal *') }}
    {{ Form::text('zipcode', Auth::User()->profile->zipcode, ['class' => 'form-control', 'placeholder' => 'zipcode']) }}
</div>

<div class="form-group">
    {{ Form::label('city', 'Ville *') }}
    {{ Form::text('city', Auth::User()->profile->city, ['class' => 'form-control', 'placeholder' => 'city']) }}
</div>

<div class="form-group">
    {{ Form::label('lastname', 'Nom de famille *') }}
    {{ Form::text('lastname', Auth::User()->profile->lastname, ['class' => 'form-control', 'placeholder' => 'lastname']) }}
</div>

<div class="form-group">
    {{ Form::label('firstname', 'Prénom *') }}
    {{ Form::text('firstname', Auth::User()->profile->firstname, ['class' => 'form-control', 'placeholder' => 'firstname']) }}
</div>

<div class="form-group">
    {{ Form::label('gender', 'Genre *') }}
    {{ Form::text('gender', Auth::User()->profile->gender, ['class' => 'form-control', 'placeholder' => 'gender']) }}
</div>

<div class="form-group">
    {{ Form::label('phone', 'Numero de telephone *') }}
    {{ Form::text('phone', Auth::User()->profile->phone, ['class' => 'form-control', 'placeholder' => 'phone']) }}
</div>

<div class="form-group">
    {{ Form::label('date_of_birth', 'Date de naissance') }}
    {{ Form::text('date_of_birth', Auth::User()->profile->date_of_birth, ['class' => 'form-control', 'placeholder' => 'date_of_birth']) }}
</div>

<div>
    {{ Form::hidden('_method', 'PUT') }}
    {!! Form::submit('Mettre a jour le profil', ['class' => 'btn btn-lg btn-primary']) !!}

    {!! Form::close() !!}
</div>

@endsection
