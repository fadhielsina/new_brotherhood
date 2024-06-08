@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
<h1>Profile</h1>
@stop
@section('content')
@include('session')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if($user->avatar)
                        <img src="{{ url('storage/avatar/'.Auth::user()->avatar.'') }}" style="height: 100px; width: 100px;" alt="user-avatar" class="img-circle img-fluid">
                        @else
                        <img src="{{asset('assets')}}/kartu_anggota/profile_1.jpg" alt="user-avatar" class="img-circle img-fluid">
                        @endif
                    </div>
                    <h3 class="profile-username text-center">{{$user->name}}</h3>
                    <p class="text-muted text-center">{{$user->nik}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Chapter</b> <a class="float-right">{{$user->chapter->name_chapter}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Type Member</b> <a class="float-right">{{$user->usertype}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Domisili</b> <a class="float-right">{{$user->domisili}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings">
                            <form method="POST" action="{{ route('home.profile.update', $user->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">New Re-Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="repassword" placeholder="repassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</div>



@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!");
</script>
@stop