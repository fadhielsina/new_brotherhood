@extends('adminlte::page')

@section('title', 'Form Home Page')

@section('content_header')
<h1>Form</h1>
@stop

@section('content')
@include('session')

<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('landing_page.home.submit') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="">Tittle</label>
                    <input type="string" class="form-control" id="section_title" name="section_title">
                </div>
                <div class="form-group">
                    <label for="">Section Body</label>
                    <textarea type="string" class="form-control" id="section_body" name="section_body"> </textarea>
                </div>
                <div class="form-group">
                    <label for="">Section Image</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="section_img" name="section_img">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Tittle 2</label>
                    <input type="string" class="form-control" id="section_title_dua" name="section_title_dua">
                </div>
                <div class="form-group">
                    <label for="">Section Body 2</label>
                    <textarea type="string" class="form-control" id="section_body_dua" name="section_body_dua"> </textarea>
                </div>
                <div class="form-group">
                    <label for="">Section Image 2</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="section_img_dua" name="section_img_dua">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Tittle 3</label>
                    <input type="string" class="form-control" id="section_title_tiga" name="section_title_tiga">
                </div>
                <div class="form-group">
                    <label for="">Section Body 3</label>
                    <textarea type="string" class="form-control" id="section_body_tiga" name="section_body_tiga"> </textarea>
                </div>
                <div class="form-group">
                    <label for="">Section Image 3</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="section_img_tiga" name="section_img_tiga">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Section Image 3.1</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="section_img_tiga_satu" name="section_img_tiga_satu">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Section Image 3.2</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="section_img_tiga_dua" name="section_img_tiga_dua">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
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