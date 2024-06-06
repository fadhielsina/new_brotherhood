@extends('adminlte::page')

@section('title', 'Form Home Page')

@section('content_header')
<h1>Form</h1>
@stop

@section('content')
@include('session')

<div class="card">
    <div class="card-body">
        @if($form == 'add')
        <form method="post" action="{{ route('landing_page.home.submit') }}" enctype="multipart/form-data">
            @else
            <form method="POST" action="{{ route('landing_page.home.update', $data->id) }}" enctype="multipart/form-data">
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
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="section_img" name="section_img">
                                <label class="custom-file-label" for="exampleInputFile">Chose File</label>
                            </div>
                        </div>
                        @if($form == 'edit')
                        <img src="{{ asset('storage/front/home/'.$data->section_img.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Tittle 2</label>
                        <input type="string" class="form-control" id="section_title_dua" name="section_title_dua" value="{{($form == 'add') ? old('section_title_dua') : $data->section_title_dua}}">
                    </div>
                    <div class="form-group">
                        <label for="">Section Body 2</label>
                        <textarea rows="5" type="string" class="form-control" id="section_body_dua" name="section_body_dua"> {{($form == 'add') ? old('section_body_dua') : $data->section_body_dua}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Section Image 2</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="section_img_dua" name="section_img_dua">
                                <label class="custom-file-label" for="exampleInputFile">Chose File</label>
                            </div>
                        </div>
                        @if($form == 'edit')
                        <img src="{{ asset('storage/front/home/'.$data->section_img_dua.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Tittle 3</label>
                        <input type="string" class="form-control" id="section_title_tiga" name="section_title_tiga" value="{{($form == 'add') ? old('section_title_tiga') : $data->section_title_tiga}}">
                    </div>
                    <div class="form-group">
                        <label for="">Section Body 3</label>
                        <textarea rows="5" type="string" class="form-control" id="section_body_tiga" name="section_body_tiga"> {{($form == 'add') ? old('section_body_tiga') : $data->section_body_tiga}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Section Image 3</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="section_img_tiga" name="section_img_tiga">
                                <label class="custom-file-label" for="exampleInputFile">Chose File</label>
                            </div>
                        </div>
                        @if($form == 'edit')
                        <img src="{{ asset('storage/front/home/'.$data->section_img_tiga.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Section Image 3.1</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="section_img_tiga_satu" name="section_img_tiga_satu">
                                <label class="custom-file-label" for="exampleInputFile">Chose File</label>
                            </div>
                        </div>
                        @if($form == 'edit')
                        <img src="{{ asset('storage/front/home/'.$data->section_img_tiga_satu.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Section Image 3.2</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="section_img_tiga_dua" name="section_img_tiga_dua">
                                <label class="custom-file-label" for="exampleInputFile">Chose File</label>
                            </div>
                        </div>
                        @if($form == 'edit')
                        <img src="{{ asset('storage/front/home/'.$data->section_img_tiga_dua.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                </div>

                <div class="card-footer text-center">
                    <a href="{{url('landing_page/home')}}" class="btn btn-info">Kembali</a>
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