@extends('adminlte::page')

@section('title', 'Master Program Edit')

@section('content_header')
<h1>Master Program Edit</h1>
@stop

@section('content')
@include('session')

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('master_program.update', $data->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="">Program Name</label>
                    <input type="text" class="form-control" value="{{$data->name_program}}" id="name_program" name="name_program">
                </div>
            </div>

            <div class="card-footer text-center">
                <a href="{{url('master_program')}}" class="btn btn-info">Kembali</a>
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