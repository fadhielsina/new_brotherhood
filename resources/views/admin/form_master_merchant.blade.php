@section('plugins.BsCustomFileInput', true)
@extends('adminlte::page')

@section('title', 'Form Master Merchant')

@section('content_header')
<h1>Form</h1>
@stop

@section('content')
@include('session')

<div class="card">
    <div class="card-body">
        @if($form == 'add')
        <form method="post" action="{{ route('master_merchant.store') }}" enctype="multipart/form-data">
            @else
            <form method="POST" action="{{ route('master_merchant.update', $data->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @endif
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" id="name_product" name="name_product" value="{{($form == 'add') ? old('name_product') : $data->name_product}}">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{($form == 'add') ? old('price') : $data->price}}">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="string" class="form-control" id="description" name="description" rows="5"> {{($form == 'add') ? old('description') : $data->description}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Picture</label>
                        <x-adminlte-input-file name="picture" />
                        @if($form == 'edit')
                        <img src="{{ asset('storage/merchant/'.$data->picture.'') }}" width="200" height="200" alt="">
                        @endif
                    </div>
                </div>

                <div class="card-footer text-center">
                    <a href="{{url('master_merchant')}}" class="btn btn-info">Kembali</a>
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