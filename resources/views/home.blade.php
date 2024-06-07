@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')

@role("admin")
<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$data['jumlah_member']}}</h3>
                <p>Jumlah Member</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('master_member.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$data['jumlah_chapter']}}</h3>
                <p>Jumlah Chapter</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('master_chapter.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$data['jumlah_program']}}</h3>
                <p>Jumlah Program</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('master_program.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$data['jumlah_activity']->count()}}</h3>
                <p>Jumlah News Activity</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('news_activity.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>

<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-7 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        {{Auth::user()->nik}}
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>{{Auth::user()->name}}</b></h2>
                                <p class="text-muted text-sm"><b>Type Member: </b> {{Auth::user()->usertype}} </p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class=""><span class="fa-li"><i class="fas fa-solid fa-building"></i></span> Address: {{Auth::user()->address}}</li>
                                    <li class=""><span class="fa-li"><i class="fas fa-solid fa-phone"></i></span> Phone: {{Auth::user()->phone}}</li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{asset('assets')}}/kartu_anggota/profile_1.jpg" alt="user-avatar" class="img-circle img-fluid">
                                <!-- <img src="{{ url('storage/avatar/'.Auth::user()->avatar.'') }}" style="height: 100px; width: 100px;" alt="user-avatar" class="img-circle img-fluid"> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fas fa-download"></i> Download Kartu Anggota
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">News Activity</h3>
                    </div>
                    <div class="card-body">
                        <strong><i class="far fa-file-alt mr-1"></i> {{$data['news_activity']->program->name_program}}</strong>
                        <small class="badge badge-danger"><i class="far fa-clock"></i> {{date("d-M-Y H:i:s", strtotime($data['news_activity']->start_date))}} </small>
                        <p class="text-muted"><?= nl2br($data['news_activity']->description) ?></p>
                        <hr>
                        <div class="text-center">
                            @if($data['status_checkin'] == 1)
                            <a href="{{route('home.checkin')}}" class="btn btn-primary">Attend</a>
                            @else
                            <a href="{{route('home.checkin')}}" class="btn btn-danger disabled">Attend</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header mb-2">
        <h3 class="card-title">Info Kegiatan</h3>
    </div>
    <div class="col-md-12">
        <div class="timeline">
            <!-- Start Looping -->
            @foreach($data['jumlah_activity'] as $val)
            <div class="time-label">
                <span class="bg-red">{{date("d-M-Y", strtotime($val->start_date))}}</span>
            </div>
            <div>
                <i class="fas fa-envelope bg-blue"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> {{$val->status_activity}}</span>
                    <h3 class="timeline-header">{{$val->program->name_program}}</h3>
                    <div class="timeline-body">
                        <?= nl2br($val->description) ?>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- End Looping -->
            <div>
                <i class="fas fa-clock bg-gray"></i>
            </div>
        </div>
    </div>
</div>
@endrole

@role("member-merchant")
@include('dashboard')
@endrole

@role("member")
@include('dashboard')
@endrole

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