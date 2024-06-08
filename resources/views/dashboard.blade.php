<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>Profile</h3>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{url('home_profile')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3>News</h3>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-7">

        <div class="small-box bg-danger">
            <div class="inner">
                <h3>My Brother</h3>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <!-- <img src="{{asset('assets')}}/kartu_anggota/profile_1.jpg" alt="user-avatar" class="img-circle img-fluid"> -->
                                <img src="{{ url('storage/avatar/'.Auth::user()->avatar.'') }}" style="height: 100px; width: 100px;" alt="user-avatar" class="img-circle img-fluid">
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
                        @foreach($data['news_activity'] as $val)
                        <strong><i class="far fa-file-alt mr-1"></i> {{$val->program->name_program}}</strong>
                        <small class="badge badge-danger"><i class="far fa-clock"></i> {{date("d-M-Y H:i:s", strtotime($val->start_date))}} </small>
                        <p class="text-muted"><?= nl2br($val->description) ?></p>
                        <hr>
                        <div class="text-center">
                            @if($data['status_checkin'] == 1)
                            <a href="{{route('home.checkin', $val->id)}}" class="btn btn-primary">Attend</a>
                            @else
                            <a class="btn btn-danger disabled">Attend</a>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>