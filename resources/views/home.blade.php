@extends('layouts.app')

@section('content')

<div class="table-responsive">
    

<table class="table table-condensed" id="users-table">
        <thead>
            <tr>
             <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Delete</th>
            </tr>
        </thead>
    </table>

</div>




<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('datatables.data') }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'names', name: 'names' },
            { data: 'action', name: 'action' }

        ]
    });
});
</script>
@endsection
