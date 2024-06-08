@section('plugins.BsCustomFileInput', true)
@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])
@section('auth_header', __('adminlte::adminlte.register_message'))
@section('auth_body')
@include('session')
<form method="post" action="{{ route('reguser.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="">NIK*</label>
            <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}">
        </div>
        <div class="form-group">
            <label for="">Name*</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="">Email*</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="">Address*</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
        </div>
        <div class="form-group">
            <label for="">Phone*</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
        </div>
        <div class="form-group">
            <label for="">Birth Place*</label>
            <input type="text" class="form-control" id="birth_place" name="birth_place" value="{{ old('birth_place') }}">
        </div>
        <div class="form-group">
            <label for="">Birth Day*</label>
            <input type="date" class="form-control" id="birth_day" name="birth_day" value="{{ old('birth_day') }}">
        </div>
        <div class="form-group">
            <label for="">Domisili*</label>
            <input type="text" class="form-control" id="domisili" name="domisili" value="{{ old('domisili') }}">
        </div>
        <div class="form-group">
            <label for="">Chapter*</label>
            <select class="form-control" name="chapter_id" id="chapter_id">
                <option disabled selected>Select Chapter</option>
                @foreach($chapter as $c)
                <option value="{{$c->id}}">{{$c->name_chapter}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Role*</label>
            <select class="form-control" name="role" id="role">
                <option disabled selected>Select Role</option>
                @foreach($role as $r)
                <option value="{{$r->name}}">{{$r->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Foto Profile</label>
            <div class="input-group">
                <x-adminlte-input-file name="avatar" />
            </div>
        </div>
        <div class="form-group">
            <label for="">Password*</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="">Re-Password*</label>
            <input type="password" class="form-control" id="repassword" name="repassword">
        </div>
    </div>

    <div class="card-footer text-center">
        <a href="{{url('login')}}" class="btn btn-info">Kembali</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>
@stop