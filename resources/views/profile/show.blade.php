@extends('layouts.app')

@section('content')
<div class="container" id="content">
    <div class="row">
        <div class="col-md-3 blue">
            <div class="profile-img">
                <img src="{{ Auth::User()->profile->pic_path }}" alt=""/>
            </div>
            <div  class="profile-img">
                <div class="file btn btn-lg btn-primary">
                    Change Photo
                </div>
            </div>
            <div class="profile-work">
                <p>WORK LINK</p>
                <a href="">Website Link</a><br/>
                <a href="">Bootsnipp Profile</a><br/>
                <a href="">Bootply Profile</a>
                <p>SKILLS</p>
                <a href="">Web Designer</a><br/>
                <a href="">Web Developer</a><br/>
                <a href="">WordPress</a><br/>
                <a href="">WooCommerce</a><br/>
                <a href="">PHP, .Net</a><br/>
            </div>
        </div>
        <div class="col-md-9 red">
            <div>
                <h5>
                    {{ Auth::User()->profile->lastname }} {{ Auth::User()->profile->firstname }}
                </h5>
            </div>
            <div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Mes informations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pref-tab" data-toggle="tab" href="#pref" role="tab" aria-controls="pref" aria-selected="false">Preferences</a>
                    </li>
                </ul>
            </div>
            <div>
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                        <div class="row">
                            <div class="col-md-4">
                                <label>User Id</label>
                            </div>
                            <div class="col-md-8">
                                <p>{{ Auth::User()->username }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Name</label>
                            </div>
                            <div class="col-md-8">
                                <p>{{ Auth::User()->profile->lastname }} {{ Auth::User()->profile->firstname }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Email</label>
                            </div>
                            <div class="col-md-8">
                                <p>{{ Auth::User()->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>address </label>
                            </div>
                            <div class="col-md-8">
                                <p>{{ Auth::User()->profile->address }} <br/>
                                    {{ Auth::User()->profile->zipcode }}, {{ Auth::User()->profile->city }}</p>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Gender</label>
                            </div>
                            <div class="col-md-8">
                                <p>{{ Auth::User()->profile->gender }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Date de naissance</label>
                            </div>
                            <div class="col-md-8">
                                <p>{{ Auth::User()->profile->date_of_birth }}</p>
                            </div>
                        </div>   
                    </div>
                    <div class="tab-pane fade" id="pref" role="tabpanel" aria-labelledby="pref-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Experience</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Hourly Rate</label>
                            </div>
                            <div class="col-md-6">
                                <p>10$/hr</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Projects</label>
                            </div>
                            <div class="col-md-6">
                                <p>230</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>English Level</label>
                            </div>
                            <div class="col-md-6">
                                <p>Expert</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Availability</label>
                            </div>
                            <div class="col-md-6">
                                <p>6 months</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Your Bio</label><br/>
                                <p>Your detail description</p>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
