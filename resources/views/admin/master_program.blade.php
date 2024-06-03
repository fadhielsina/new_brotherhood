@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'Master Program')

@section('content_header')
<h1>Master Program</h1>
@stop

@section('content')
@include('session')
{{-- Themed --}}
<x-adminlte-modal id="modalPurple" title="Form" theme="purple" icon="fas fa-plus" size='lg' disable-animations>
    <form method="post" action="{{ route('master_program.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="">Program Name</label>
                <input type="text" class="form-control" id="name_program" name="name_program">
            </div>
        </div>

        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
</x-adminlte-modal>
{{-- Example button to open modal --}}
<x-adminlte-button label="Create Program" data-toggle="modal" data-target="#modalPurple" class="bg-purple" />
<div class="card">
    <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Program Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($program as $val)
                <tr>
                    <td>{{$val->name_program}}</td>
                    <td>
                        <a href="{{ route('master_program.edit', $val->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
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
            url: `master_program/${id}`,
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