@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'CMS Home Page')

@section('content_header')
<h1>CMS Home Page</h1>
@stop

@section('content')
@include('session')
<a href="{{ route('landing_page.home.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> Create</a>
<div class="card">
    <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Section Title</th>
                    <th>Section Body</th>
                    <th>Section Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $val)
                <tr>
                    <td>{{$val->user_id}}</td>
                    <td><?= nl2br($val->section_title) ?></td>
                    <td><?= nl2br($val->section_body) ?></td>
                    <td><img src="{{ url('storage/front/home/'.$val->section_img.'') }}" width="100" height="100" alt=""></td>
                    <td><?= ($val->status == 0) ? 'Pending' : 'Active'; ?></td>
                    <td>
                        <a href="{{ route('landing_page.home.edit', $val->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
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
<script src="{{asset('vendor')}}/datatables-plugins/buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('vendor')}}/datatables-plugins/buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('vendor')}}/datatables-plugins/buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('vendor')}}/datatables-plugins/buttons/js/buttons.print.min.js"></script>
<script src="{{asset('vendor')}}/datatables-plugins/jszip/jszip.min.js"></script>
<script src="{{asset('vendor')}}/datatables-plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('vendor')}}/datatables-plugins/pdfmake/vfs_fonts.js"></script>

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
            url: `landing_page.home.store/${id}`,
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