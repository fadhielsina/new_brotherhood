@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'CMS Home Page')

@section('content_header')
<h1>CMS Home Page</h1>
@stop

@section('content')
@include('session')
<?php $heads = [
    'User ID',
    'Section Title',
    'Section Body',
    'Section Image',
    'Status',
    'Action',
]; ?>

<a href="{{ route('landing_page.home.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> Create</a>
<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads">
            @foreach($data as $val)
            <tr>
                <td>{{$val->user->name}}</td>
                <td><?= nl2br($val->section_title) ?></td>
                <td><?= nl2br($val->section_body) ?></td>
                <td><img src="{{ asset('storage/front/home/'.$val->section_img.'') }}" width="100" height="100" alt=""></td>
                <td><?= ($val->status == 0) ? '<button class="btn btn-block btn-outline-warning btn-sm">Pending</button>' : '<button class="btn btn-block btn-outline-success btn-sm">Active</button>'; ?></td>
                <td>
                    <a href="{{ route('landing_page.home.edit', $val->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                    @role('admin')
                    <form action="{{ route('landing_page.home.destroy', $val->id) }}" method="post" class="d-inline" onsubmit="return confirm('apakah anda yakin?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="delete"><span class="fa fa-trash"></span></button>
                    </form>
                    <a href="{{ route('landing_page.home.posting', $val->id) }}" class="btn btn-sm btn-primary mt-2" onclick="return confirm('Anda Yakin?')">Publish</a>
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