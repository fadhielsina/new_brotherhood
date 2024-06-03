@extends('adminlte::page')

@section('title', 'Form Member')

@section('content_header')
<h1>Form Member</h1>
@stop

@section('content')
@include('session')

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('member_request.update', $user->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="">NIK*</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{$user->nik}}" disabled>
                </div>
                <div class="form-group">
                    <label for="">Name*</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" disabled>
                </div>
                <div class="form-group">
                    <label for="">Email*</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" disabled>
                </div>
                <div class="form-group">
                    <label for="">Address*</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}" disabled>
                </div>
                <div class="form-group">
                    <label for="">Phone*</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}" disabled>
                </div>
                <div class="form-group">
                    <label for="">Birth Place*</label>
                    <input type="text" class="form-control" id="birth_place" name="birth_place" value="{{$user->birth_place}}" disabled>
                </div>
                <div class="form-group">
                    <label for="">Birth Day*</label>
                    <input type="date" class="form-control" id="birth_day" name="birth_day" value="{{$user->birth_day}}" disabled>
                </div>
                <div class="form-group">
                    <label for="">Domisili*</label>
                    <input type="text" class="form-control" id="domisili" name="domisili" value="{{$user->domisili}}" disabled>
                </div>
                <div class="form-group">
                    <label for="">Type User*</label>
                    <input type="text" class="form-control" value="{{$user->usertype}}" disabled>
                </div>
                <div class="form-group">
                    <label for="">Chapter*</label>
                    <input type="text" class="form-control" value="{{$user->chapter->name_chapter}}" disabled>
                </div>
                <div class="form-group">
                    <label for="">Role*</label>
                    <input type="text" class="form-control" value="{{$user->roles[0]->name}}" disabled>
                </div>
                <div class="form-group">
                    <label for="">Foto Profile*</label>
                    <img src="{{ url('storage/avatar/'.$user->avatar.'') }}" style="height: 400px; width: 400px;" alt="user-avatar">
                </div>
            </div>

            <div class="card-footer text-center">
                <a href="{{url('member_request')}}" class="btn btn-info">Kembali</a>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">Verifikasi</button>
            </div>

        </form>
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