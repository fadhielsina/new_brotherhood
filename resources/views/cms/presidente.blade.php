@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'CMS El-Presidente Page')

@section('content_header')
<h1>CMS El Presidente Page</h1>
@stop

@section('content')
@include('session')
<?php $heads = [
    'User ID',
    'Section Body',
    'Section Image',
    'Status',
    'Action',
]; ?>

<a href="{{ route('landing_page.presidente.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> Create</a>
<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads">
            @foreach($data as $val)
            <tr>
                <td>{{$val->user->name}}</td>
                <td><?= nl2br($val->section_body) ?></td>
                <td><img src="{{ asset('storage/front/el_presidente/'.$val->section_img.'') }}" width="100" height="100" alt=""></td>
                <td><?= ($val->status == 0) ? '<button class="btn btn-block btn-outline-warning btn-sm">Pending</button>' : '<button class="btn btn-block btn-outline-success btn-sm">Active</button>'; ?></td>
                <td>
                    <a href="{{ route('landing_page.presidente.edit', $val->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span></a>
                    @role('admin')
                    <form action="{{ route('landing_page.presidente.destroy', $val->id) }}" method="post" class="d-inline" onsubmit="return confirm('apakah anda yakin?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm delete" data-toggle="tooltip" data-placement="top" title="delete"><span class="fa fa-trash"></span></button>
                    </form>
                    <a href="{{ route('landing_page.presidente.posting', $val->id) }}" class="btn btn-sm btn-primary mt-2" onclick="return confirm('Anda Yakin?')">Publish</a>
                    @endrole
                </td>
            </tr>
            @endforeach
        </x-adminlte-datatable>
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