@extends('adminlte::page')

@section('title', 'View Certificates')

@section('content_header')
    <h1>View Certificates</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">All Certificates</h3>
                </div>

                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>Certificate #</th>
                                <th>User Name</th>
                                <th>Employee ID</th>
                                <th>Score</th>
                                <th>Email</th>
                                <th>Issued</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
@stop

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            let table = $('#myTable').DataTable({
                ajax: '{{ route('certificates.data') }}',
                columns: [{
                        data: 'code',
                        render: function(data) {
                            return `#${data}`;
                        }
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'employee_id'
                    },
                    {
                        data: 'score',
                        render: function(data) {
                            return `${data} %`;
                        }
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'created_at'
                    },
                    {
            data: null,
            render: function(data, type, row) {
                return `<a href="/certificates/view/${row.code}" <i class="text-info btn-sm fas fa-eye"></i> </a>&nbsp;&nbsp; 
                        <a href="/admin/certificates/edit/${row.code}" <i class="text-warning fas fa-edit btn-sm"></i> </a>&nbsp;&nbsp;        
                        <i class="text-danger fas fa-trash delete_cert" data-id="${row.id}"></i>`;
            }
        }
                ],
                responsive: true,
            });

            // Use event delegation to attach click event to dynamically created elements
            $('#myTable').on('click', '.delete_cert', function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure, you want to delete this certificate?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/certificates/delete/' + id, // Fix the URL format
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}' // Laravel requires a CSRF token for DELETE requests
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Certificate has been deleted.",
                                        icon: "success"
                                    });
                                    table.ajax.reload();
                                } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: response.message,
                                        icon: "error"
                                    });
                                }
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    title: "Error!",
                                    text: "Something went wrong. Please try again later.",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@stop
