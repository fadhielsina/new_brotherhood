@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'CMS Blog Page')

@section('content_header')
<h1>CMS Blog Page</h1>
@stop

@section('content')
@include('session')
<?php $heads = [
    'User ID',
    'Event Name',
    'Title',
    'Description',
    'Picture',
    'Status',
    'Action',
]; ?>

<a href="{{ route('landing_page.blog.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> Create</a>
<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads">
            @foreach($data as $val)
            <tr>
                <td>{{$val->user->name}}</td>
                <td>{{$val->event_name}}</td>
                <td>{{$val->title}}</td>
                <td><?= substr(nl2br($val->description), 0, 150) ?> ...</td>
                <td><img src="{{ asset('storage/front/blog/'.$val->picture.'') }}" width="100" height="100" alt=""></td>
                <td><?= ($val->status == 0) ? '<button class="btn btn-block btn-outline-warning btn-sm">Pending</button>' : '<button class="btn btn-block btn-outline-success btn-sm">Active</button>'; ?></td>
                <td>
                    <a href="{{ route('landing_page.blog.edit', $val->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                    @role('admin')
                    <form action="{{ route('landing_page.blog.destroy', $val->id) }}" method="post" class="d-inline" onsubmit="return confirm('apakah anda yakin?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="tooltip" data-placement="top" title="delete"><span class="fa fa-trash"></span></button>
                    </form>
                    <a href="{{ route('landing_page.blog.posting', $val->id) }}" class="btn btn-sm btn-primary mt-2" onclick="return confirm('Anda Yakin?')">Publish</a>
                    @endrole
                </td>
            </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>

</div>
@stop

@section('js')
@stop