@extends('adminlte::page')

@section('title', 'View Employees')

@section('content_header')
    <h1>View Employees</h1>
@stop
@section('content_header')
    <h1>View Employees</h1>
@stop

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">All Employees</h3>
                </div>

                <div class="card-body">
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Employee ID</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Whats'app Number </th>
                                <th>OPCO</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->employee_id }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->whatsapp }}</td>
                                    <td>{{ $item->opco }}</td>                                    
                                    <td><i class="text-info fas fa-eye"></i> &nbsp;&nbsp; <i class="text-warning fas fa-edit"></i> &nbsp;&nbsp; <i class="text-danger fas fa-trash"></i></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

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
    <script>
        let table = new DataTable('#myTable', {
            responsive: true,
});
    </script>
@stop
