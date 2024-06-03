@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'Master Member')

@section('content_header')
<h1>Master Member</h1>
@stop

@section('content')
@include('session')
<a href="{{ route('master_member.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> Create Member</a>
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
                        <a href="{{ route('master_member.edit', $val->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
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
            url: `master_member/${id}`,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function(response) {
                location.reload();
            }
        })
    })
</script>
@stop