@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'Member Request')

@section('content_header')
<h1>Member Request</h1>
@stop

@section('content')
@include('session')
<div class="card">
    <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NIK Anggota</th>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Nama Chapter</th>
                    <th>Email</th>
                    <th>Type Member</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $val)
                <tr>
                    <td>{{$val->nik}}</td>
                    <td>{{$val->name}}</td>
                    <td>{{$val->roles[0]->name}}</td>
                    <td>{{$val->chapter->name_chapter}}</td>
                    <td>{{$val->email}}</td>
                    <td>{{$val->usertype}}</td>
                    <td>
                        <a href="{{ route('member_request.edit', $val->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
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
@stop