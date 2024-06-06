@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'News Activity')

@section('content_header')
<h1>News Activity</h1>
@stop

@section('content')
@include('session')
{{-- Themed --}}
<x-adminlte-modal id="modalPurple" title="Form" theme="purple" icon="fas fa-plus" size='lg' disable-animations>
    <form method="post" action="{{ route('news_activity.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="">Program</label>
                <x-adminlte-select name="program_id" id="program_id">
                    <option disabled selected>Select Program</option>
                    @foreach($program as $r)
                    <option value="{{$r->id}}">{{$r->name_program}}</option>
                    @endforeach
                </x-adminlte-select>
            </div>
            <div class="form-group">
                <label for="">Activity Name</label>
                <input type="string" class="form-control" id="name_activity" name="name_activity">
            </div>
            <div class="form-group">
                <label for="">Start Date</label>
                <input type="datetime-local" class="form-control" id="start_date" name="start_date">
            </div>
            <div class="form-group">
                <label for="">End Date</label>
                <input type="datetime-local" class="form-control" id="end_date" name="end_date">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>
        </div>

        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</x-adminlte-modal>
{{-- Example button to open modal --}}
<x-adminlte-button label="Create Activity" data-toggle="modal" data-target="#modalPurple" class="bg-info" />
<div class="card">
    <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Activity Name</th>
                    <th>Program Name</th>
                    <th>Start Event</th>
                    <th>End Event</th>
                    <th>Description</th>
                    <th>Activity Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activity as $val)
                <tr>
                    <td>{{$val->name_activity}}</td>
                    <td>{{$val->program->name_program}}</td>
                    <td>{{$val->start_date}}</td>
                    <td>{{$val->end_date}}</td>
                    <td><?= nl2br($val->description) ?></td>
                    <td><button class="btn btn-block btn-outline-success btn-sm">{{$val->status_activity}}</button></td>
                    <td>
                        <a href="{{ route('news_activity.edit', $val->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                        <button type="submit" class="btn btn-sm btn-danger" id="delete_data" value="{{$val->id}}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@stop

@section('js')
<script src="vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js"></script>
<script src="vendor/datatables-plugins/buttons/js/buttons.bootstrap4.min.js"></script>
<script src="vendor/datatables-plugins/buttons/js/buttons.html5.min.js"></script>
<script src="vendor/datatables-plugins/buttons/js/buttons.print.min.js"></script>
<script src="vendor/datatables-plugins/jszip/jszip.min.js"></script>
<script src="vendor/datatables-plugins/pdfmake/pdfmake.min.js"></script>
<script src="vendor/datatables-plugins/pdfmake/vfs_fonts.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "order": [
                [2, 'asc']
            ],
        });
    });
</script>

<script>
    $(document).on('click', '#delete_data', function() {
        // function
        if (!confirm('Are you sure?')) return false;
        var id = $(this).val();
        var token = "{{ csrf_token() }}";
        $.ajax({
            url: `news_activity/${id}`,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function(response) {
                // window.location.href = "data_ppns";
                location.reload();
            }
        })
    })
</script>
@stop