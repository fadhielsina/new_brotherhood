@extends('adminlte::page')

@section('title', 'Form El-Presidente Page')

@section('content_header')
<h1>Form</h1>
@stop

@section('content')
@include('session')

<div class="card">
    <div class="card-body">
        @if($form == 'add')
        <form method="post" action="{{ route('landing_page.presidente.submit') }}" enctype="multipart/form-data">
            @else
            <form method="POST" action="{{ route('landing_page.presidente.update', $data->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @endif
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Section Body</label>
                        <textarea type="string" class="form-control" id="section_body" name="section_body" rows="5"> {{($form == 'add') ? old('section_body') : $data->section_body}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Section Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="section_img" name="section_img">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        @if($form == 'edit')
                        <img src="{{ asset('storage/front/el_presidente/'.$data->section_img.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Section Image 2</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="section_img_dua" name="section_img_dua">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        @if($form == 'edit')
                        <img src="{{ asset('storage/front/el_presidente/'.$data->section_img_dua.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Section Image 3</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="section_img_tiga" name="section_img_tiga">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        @if($form == 'edit')
                        <img src="{{ asset('storage/front/el_presidente/'.$data->section_img_tiga.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Section Image 4</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="section_img_empat" name="section_img_empat">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        @if($form == 'edit')
                        <img src="{{ asset('storage/front/el_presidente/'.$data->section_img_empat.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Section Image 5</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="section_img_lima" name="section_img_lima">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        @if($form == 'edit')
                        <img src="{{ asset('storage/front/el_presidente/'.$data->section_img_lima.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Section Image 6</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="section_img_enam" name="section_img_enam">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        @if($form == 'edit')
                        <img src="{{ asset('storage/front/el_presidente/'.$data->section_img_enam.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                </div>

                <div class="card-footer text-center">
                    <a href="{{url('landing_page/el_presidente')}}" class="btn btn-info">Kembali</a>
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