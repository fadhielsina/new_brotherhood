@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'CMS Home Page')

@section('content_header')
<h1>CMS Home Page</h1>
@stop

@section('content')
@include('session')
<?php $heads = [
    'Type Sliders',
    'File',
    'Status',
    'Action',
]; ?>

<a href="{{ route('landing_page.sliders.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> Create</a>
<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads">
            @foreach($data as $val)
            <tr>
                <td><?= ($val->status == 0) ? 'Image' : 'Video' ?></td>
                <td><img src="{{ asset('storage/front/sliders/'.$val->name_file.'') }}" width="100" height="100" alt=""></td>
                <td><?= ($val->status == 0) ? '<button class="btn btn-block btn-outline-warning btn-sm">Pending</button>' : '<button class="btn btn-block btn-outline-success btn-sm">Active</button>'; ?></td>
                <td>
                    <!-- <a href="{{ route('landing_page.sliders.edit', $val->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a> -->
                    @role('admin')
                    <form action="{{ route('landing_page.sliders.destroy', $val->id) }}" method="post" class="d-inline" onsubmit="return confirm('apakah anda yakin?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="delete"><span class="fa fa-trash"></span></button>
                    </form>
                    <a href="{{ route('landing_page.sliders.posting', $val->id) }}" class="btn btn-sm btn-primary" onclick="return confirm('Anda Yakin?')">Publish</a>
                    <a href="{{ route('landing_page.sliders.unposting', $val->id) }}" class="btn btn-sm btn-warning" onclick="return confirm('Anda Yakin?')">Un Publish</a>
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