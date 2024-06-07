@extends('adminlte::page')

@section('title', 'Form Checkin')

@section('content_header')
<h1>From Checkin</h1>
@stop

@section('content')
@include('session')

<div class="card card-primary card-outline">
    <div class="card-body box-profile text-center">
        <form method="POST" action="{{ route('home.checkin_submit') }}">
            @csrf
            <div class="text-center">
                <div class="row">
                    <div class="col" id="my_camera"></div>
                    <div class="col" id="results"></div>
                </div>
            </div>
            <h3 class="profile-username">{{Auth::user()->name}}</h3>
            <p class="text-muted text-center">{{Auth::user()->chapter->name_chapter}}</p>
            <ul class="list-group list-group-unbordered mb-3 text-center">
                <li class="list-group-item">
                    <input class="btn btn-info" type=button value="Take Snapshot" onClick="take_snapshot()">
                    <input type="hidden" name="image" class="image-tag">
                </li>
            </ul>
            <button class="btn btn-success">Submit</button>
        </form>
    </div>
</div>

@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img class="mt-auto" src="' + data_uri + '"/>';
        });
    }
</script>
@stop