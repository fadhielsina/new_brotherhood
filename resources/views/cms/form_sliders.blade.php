@section('plugins.BsCustomFileInput', true)
@extends('adminlte::page')

@section('title', 'Form Sliders')

@section('content_header')
<h1>Form</h1>
@stop

@section('content')
@include('session')

<div class="card">
    <div class="card-body">
        @if($form == 'add')
        <form method="post" action="{{ route('landing_page.sliders.submit') }}" enctype="multipart/form-data">
            @else
            <form method="POST" action="{{ route('landing_page.sliders.update', $data->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @endif
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Type Sliders*</label>
                        <x-adminlte-select name="type" id="type">
                            <option value="0">Image</option>
                            <!-- <option value="1">Vidio</option> -->
                        </x-adminlte-select>
                    </div>
                    <div class="form-group">
                        <label for="">Section Image*</label>
                        <x-adminlte-input-file name="name_file" />
                        @if($form == 'edit')
                        <img src="{{ asset('storage/front/sliders/'.$data->name_file.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                </div>

                <div class="card-footer text-center">
                    <a href="{{url('landing_page/sliders')}}" class="btn btn-info">Kembali</a>
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