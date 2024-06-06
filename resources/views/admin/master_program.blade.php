@section('plugins.Datatables', true)
@extends('adminlte::page')

@section('title', 'Master Program')

@section('content_header')
<h1>Master Program</h1>
@stop

@section('content')
@include('session')
<?php $heads = [
    'Program Name',
    'Action',
]; ?>

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
        <x-adminlte-datatable id="table1" :heads="$heads">
            @foreach($program as $val)
            <tr>
                <td>{{$val->name_program}}</td>
                <td>
                    <a href="{{ route('master_program.edit', $val->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                    <button type="submit" class="btn btn-sm btn-danger" id="delete_data" value="{{$val->id}}"><i class="fas fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>

</div>
@stop

@section('js')
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