@extends('adminlte::page')

@section('title', 'Form Member')

@section('content_header')
<h1>Form Member</h1>
@stop

@section('content')
@include('session')

<div class="card">
    <div class="card-body">
        @if($form == 'add')
        <form method="post" action="{{ route('master_member.store') }}" enctype="multipart/form-data">
            @else
            <form method="POST" action="{{ route('master_member.update', $user->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @endif
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">NIK*</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{($form == 'add') ? old('nik') : $user->nik}}">
                    </div>
                    <div class="form-group">
                        <label for="">Name*</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{($form == 'add') ? old('name') : $user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Email*</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{($form == 'add') ? old('email') : $user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="">Address*</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{($form == 'add') ? old('address') : $user->address}}">
                    </div>
                    <div class="form-group">
                        <label for="">Phone*</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{($form == 'add') ? old('phone') : $user->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="">Birth Place*</label>
                        <input type="text" class="form-control" id="birth_place" name="birth_place" value="{{($form == 'add') ? old('birth_place') : $user->birth_place}}">
                    </div>
                    <div class="form-group">
                        <label for="">Birth Day*</label>
                        <input type="date" class="form-control" id="birth_day" name="birth_day" value="{{($form == 'add') ? old('birth_day') : $user->birth_day}}">
                    </div>
                    <div class="form-group">
                        <label for="">Domisili*</label>
                        <input type="text" class="form-control" id="domisili" name="domisili" value="{{($form == 'add') ? old('domisili') : $user->domisili}}">
                    </div>
                    <div class="form-group">
                        <label for="">Chapter*</label>
                        <x-adminlte-select name="chapter_id" id="chapter_id">
                            @if($form == 'add')
                            <option disabled selected>Select Chapter</option>
                            @else
                            <option value="{{$user->chapter->id}}">{{$user->chapter->name_chapter}}</option>
                            @endif
                            @foreach($chapter as $c)
                            <option value="{{$c->id}}">{{$c->name_chapter}}</option>
                            @endforeach
                        </x-adminlte-select>
                    </div>
                    @if($form == 'add')
                    <div class="form-group">
                        <label for="">Role*</label>
                        <x-adminlte-select name="role" id="role">
                            <option disabled selected>Select Role</option>
                            @foreach($role as $r)
                            <option value="{{$r->name}}">{{$r->name}}</option>
                            @endforeach
                        </x-adminlte-select>
                    </div>
                    <div class="form-group">
                        <label for="">Foto Profile</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="avatar" name="avatar">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="form-group">
                        <label for="">Type Member*</label>
                        <x-adminlte-select name="usertype" id="usertype">
                            <option value="{{$user->usertype}}" selected disabled>{{$user->usertype}}</option>
                            <option value="prospect">Prospect</option>
                            <option value="virgin">Virgin</option>
                            <option value="lifemember">Life Member</option>
                        </x-adminlte-select>
                    </div>
                    @endif
                </div>

                <div class="card-footer text-center">
                    <a href="{{url('master_member')}}" class="btn btn-info">Kembali</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
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