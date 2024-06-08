@section('plugins.BsCustomFileInput', true)
@extends('adminlte::page')

@section('title', 'Form Blog Page')

@section('content_header')
<h1>Form</h1>
@stop

@section('content')
@include('session')

<div class="card">
    <div class="card-body">
        @if($form == 'add')
        <form method="post" action="{{ route('landing_page.blog.submit') }}" enctype="multipart/form-data">
            @else
            <form method="POST" action="{{ route('landing_page.blog.update', $data->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @endif
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Event Name*</label>
                        <x-adminlte-select name="event_name" id="event_name">
                            @if($form == 'add')
                            <option disabled selected>Select Event</option>
                            @else
                            <option value="{{$data->event_name}}">{{$data->event_name}}</option>
                            @endif
                            @foreach($program as $c)
                            <option value="{{$c->name_program}}">{{$c->name_program}}</option>
                            @endforeach
                        </x-adminlte-select>
                    </div>
                    <div class="form-group">
                        <label for="">Tittle</label>
                        <input type="string" class="form-control" id="title" name="title" value="{{($form == 'add') ? old('title') : $data->title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="string" class="form-control" id="description" name="description" rows="10"> {{($form == 'add') ? old('description') : $data->description}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Picture</label>
                        <x-adminlte-input-file name="picture" />
                        @if($form == 'edit')
                        <img src="{{ asset('storage/front/blog/'.$data->picture.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{url('landing_page/blog')}}" class="btn btn-info">Kembali</a>
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