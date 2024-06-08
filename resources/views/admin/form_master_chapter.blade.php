@section('plugins.BsCustomFileInput', true)
@extends('adminlte::page')

@section('title', 'Master Chapter Edit')

@section('content_header')
<h1>Master Chapter Edit</h1>
@stop

@section('content')
@include('session')

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('master_chapter.update', $data->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="">Chapter Name</label>
                    <input type="text" class="form-control" value="{{$data->name_chapter}}" id="name_chapter" name="name_chapter">
                </div>
                <div class="form-group">
                    <label for="">Location</label>
                    <input type="string" class="form-control" value="{{$data->location}}" id="location" name="location">
                </div>
                <div class="form-group">
                    <label for="">Logo File</label>
                    <x-adminlte-input-file name="logo_chapter" />
                </div>
            </div>

            <div class="card-footer text-center">
                <a href="{{url('master_chapter')}}" class="btn btn-info">Kembali</a>
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