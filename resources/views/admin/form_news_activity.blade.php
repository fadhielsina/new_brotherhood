@extends('adminlte::page')

@section('title', 'Form News Activity')

@section('content_header')
<h1>Form</h1>
@stop

@section('content')
@include('session')

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('news_activity.update', $data->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="">Program</label>
                    <x-adminlte-select name="program_id" id="program_id">
                        <option value="{{$data->program_id}}" selected>{{$data->program->name_program}}</option>
                        @foreach($program as $r)
                        @if($r->id != $data->program_id)
                        <option value="{{$r->id}}">{{$r->name_program}}</option>
                        @endif
                        @endforeach
                    </x-adminlte-select>
                </div>
                <div class="form-group">
                    <label for="">Activity Name</label>
                    <input type="string" class="form-control" id="name_activity" name="name_activity" value="{{$data->name_activity}}">
                </div>
                <div class="form-group">
                    <label for="">Start Date</label>
                    <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{$data->start_date}}">
                </div>
                <div class="form-group">
                    <label for="">End Date</label>
                    <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{$data->end_date}}">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="5">{{$data->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Status Activity</label>
                    <x-adminlte-select name="status_activity" id="status_activity">
                        <option value="{{$data->status_activity}}" selected disabled>{{$data->status_activity}}</option>
                        <option value="pending">Pending</option>
                        <option value="ongoing">Ongoing</option>
                        <option value="expired">Expired</option>
                    </x-adminlte-select>
                </div>
            </div>

            <div class="card-footer text-center">
                <a href="{{url('news_activity')}}" class="btn btn-info">Kembali</a>
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