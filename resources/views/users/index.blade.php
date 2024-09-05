@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">All Users</h3>
                </div>

                <div class="card-body">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ ucwords(str_replace('_', ' ', $item->getRoleNames()[0])) }}</td>
                                    <td><i data-user_id="{{ $item->id }}" data-user_name="{{ $item->name }}"
                                            data-user_email="{{ $item->email }}"
                                            data-user_role="{{ $item->getRoleNames()[0] }}" data-toggle="modal"
                                            data-target="" class="edit_user text-warning fas fa-edit "></i> &nbsp;&nbsp; <i
                                            data-user_id={{ $item->id }}
                                            class="text-danger delete_user fas fa-trash"></i></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" id="update_form" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" id="role" class="form-control select2">
                                @foreach ($roles as $item)
                                    <option value="{{ $item->name }}">
                                        {{ ucwords(str_replace('_', ' ', $item->name)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Update Password">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let table = new DataTable('#myTable', {
            responsive: true,
        });
        $('.delete_user').on('click', function() {
            user_id = $(this).data('user_id');
            row = $(this).closest('tr');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/users/' + user_id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}' // Laravel requires a CSRF token for DELETE requests
                        },
                        success: function(response) {
                            // Handle success response
                            if (response.success) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "User Deleted Successfully",
                                    icon: "success",
                                    timer: 1500,
                                    timerProgressBar: true,
                                });
                                row.remove();
                            }
                        },
                        error: function(xhr) {
                            // Handle error response
                            console.error("Error deleting user:", xhr.responseText);
                        }
                    });
                }
            })
        })
        $('.edit_user').on('click', function() {
            updateUrl = "{{ route('users.update', ':id') }}";
            updateUrl = updateUrl.replace(':id', $(this).data('user_id'));
            $('#name').val($(this).data('user_name'));
            $('#email').val($(this).data('user_email'));
            $('#password').val('');
            $('#role').val($(this).data('user_role'));
            $('#update_form').attr('action', updateUrl);
            $('#exampleModal').modal('show');
        });
    </script>
@stop
