@extends('adminlte::page')

@section('title', 'My Brohters')

@section('content_header')
<h1>My Brohters</h1>
@stop

@section('content')
@include('session')

<section class="content">

    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
                @foreach($brothers as $val)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            {{$val->nik}}
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>{{$val->name}}</b></h2>
                                    <p class="text-muted text-sm"><b>Type Member: </b> {{$val->usertype}} </p>
                                    <p class="text-muted text-sm"><b>Chapter: </b> {{$val->chapter->name_chapter}} </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{$val->address}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$val->phone}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span> Join Date #: {{date('d-m-Y', strtotime($val->created_at))}}</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    @if($val->avatar)
                                    <img src="{{ url('storage/avatar/'.$val->avatar.'') }}" style="height: 100px; width: 100px;" alt="user-avatar" class="img-circle img-fluid">
                                    @else
                                    <img src="{{asset('assets')}}/kartu_anggota/profile_1.jpg" alt="user-avatar" class="img-circle img-fluid">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</section>

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