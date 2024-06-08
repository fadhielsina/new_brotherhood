@section('plugins.BsCustomFileInput', true)
@extends('adminlte::page')

@section('title', 'Form About-US Page')

@section('content_header')
<h1>Form</h1>
@stop

@section('content')
@include('session')

<div class="card">
    <div class="card-body">
        @if($form == 'add')
        <form method="post" action="{{ route('landing_page.about_us.submit') }}" enctype="multipart/form-data">
            @else
            <form method="POST" action="{{ route('landing_page.about_us.update', $data->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @endif
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Tittle</label>
                        <input type="string" class="form-control" id="section_title" name="section_title" value="{{($form == 'add') ? old('section_title') : $data->section_title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Section Body</label>
                        <textarea rows="5" type="string" class="form-control" id="section_body" name="section_body"> {{($form == 'add') ? old('section_body') : $data->section_body}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Section Image</label>
                        <x-adminlte-input-file name="section_img" />
                        @if($form == 'edit')
                        <img src="{{ asset('storage/front/about_us/'.$data->section_img.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Tittle 2</label>
                        <input type="string" class="form-control" id="section_title_dua" name="section_title_dua" value="{{($form == 'add') ? old('section_title_dua') : $data->section_title_dua}}">
                    </div>
                    <div class="form-group">
                        <label for="">Sub Tittle</label>
                        <input type="string" class="form-control" id="section_subtitle" name="section_subtitle" value="{{($form == 'add') ? old('section_subtitle') : $data->section_subtitle}}">
                    </div>
                    <div class="form-group">
                        <label for="">Sub Body</label>
                        <textarea rows="5" type="string" class="form-control" id="section_subbody" name="section_subbody"> {{($form == 'add') ? old('section_subbody') : $data->section_subbody}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Sub Tittle 2</label>
                        <input type="string" class="form-control" id="section_subtitle_dua" name="section_subtitle_dua" value="{{($form == 'add') ? old('section_subtitle_dua') : $data->section_subtitle_dua}}">
                    </div>
                    <div class="form-group">
                        <label for="">Sub Body 2</label>
                        <textarea rows="5" type="string" class="form-control" id="section_subbody_dua" name="section_subbody_dua"> {{($form == 'add') ? old('section_subbody_dua') : $data->section_subbody_dua}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Sub Tittle 3</label>
                        <input type="string" class="form-control" id="section_subtitle_tiga" name="section_subtitle_tiga" value="{{($form == 'add') ? old('section_subtitle_tiga') : $data->section_subtitle_tiga}}">
                    </div>
                    <div class="form-group">
                        <label for="">Sub Body 3</label>
                        <textarea rows="5" type="string" class="form-control" id="section_subbody_tiga" name="section_subbody_tiga"> {{($form == 'add') ? old('section_subbody_tiga') : $data->section_subbody_tiga}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Sub Tittle 4</label>
                        <input type="string" class="form-control" id="section_subtitle_empat" name="section_subtitle_empat" value="{{($form == 'add') ? old('section_subtitle_empat') : $data->section_subtitle_empat}}">
                    </div>
                    <div class="form-group">
                        <label for="">Sub Body 4</label>
                        <textarea rows="5" type="string" class="form-control" id="section_subbody_empat" name="section_subbody_empat"> {{($form == 'add') ? old('section_subbody_empat') : $data->section_subbody_empat}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Sub Tittle 5</label>
                        <input type="string" class="form-control" id="section_subtitle_lima" name="section_subtitle_lima" value="{{($form == 'add') ? old('section_subtitle_lima') : $data->section_subtitle_lima}}">
                    </div>
                    <div class="form-group">
                        <label for="">Sub Body 5</label>
                        <textarea rows="5" type="string" class="form-control" id="section_subbody_lima" name="section_subbody_lima"> {{($form == 'add') ? old('section_subbody_lima') : $data->section_subbody_lima}} </textarea>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <a href="{{url('landing_page/about_us')}}" class="btn btn-info">Kembali</a>
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