@extends('adminlte::page')

@section('title', 'Import')

@section('content_header')
    <h1>Add Certificate</h1>
@stop

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Certificate</h3>
                </div>


                <form action="{{ route('admin.certificates.save') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Employee ID</label>
                                    <input type="text" class="form-control" id="employee_id" name="employee_id"
                                        placeholder="Enter Employee ID">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">OPCO</label>
                                    <input type="text" class="form-control" id="opco" name="opco"
                                        placeholder="Enter OPCP">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Certificate For</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter Certificate Title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="year">Academic Year</label>
                                    <input type="text" class="form-control" id="year" name="year"
                                        placeholder="Enter Academic Year">
                                </div>
                            </div>
                        </div>
                        <h3>Marks</h3>
                        <div class="row">
                            <div id="marks-container">
                                <!-- Placeholder for dynamically added rows -->
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-success" id="add-row">Add Row</button>
                        </div>
                        <div class="form-group">
                            <label for="score">Total</label>
                            <div class="input-group mb-3">
                                <input type="number" step="0.01" class="form-control" id="score" name="score"
                                    placeholder="Total Percentage">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create Certificate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
@stop

@section('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            let markIndex = 1;

            $('#add-row').click(function() {
                $('#marks-container').append(`
        <div class="row mark-row">
            <div class="col-6">
                <div class="form-group">
                    <label for="mark_${markIndex}">Name</label>
                    <input type="text" class="form-control" id="mark_${markIndex}" name="mark_${markIndex}" placeholder="Module Name">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="value_${markIndex}">Value</label>
                    <div class="input-group mb-3">
                                <input type="number" step="0.01" class="form-control mark-value" id="value_${markIndex}" name="value_${markIndex}" placeholder="percentage">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                </div>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-danger remove-row" style="margin-top: 30px;">Remove</button>
            </div>
        </div>
    `);
                markIndex++;
            });

            $(document).on('click', '.remove-row', function() {
                $(this).closest('.mark-row').remove();
                calculateTotal();
            });

            $(document).on('keyup', '.mark-value', function() {
                calculateTotal();
            });

            function calculateTotal() {
                let total = 0;
                let count = 0;
                $('.mark-value').each(function() {
                    if (!isNaN(parseFloat($(this).val()))) {
                        total += parseFloat($(this).val());
                        count++;
                    }
                });
                $('#score').val((total / count).toFixed(2));
            }
        });
    </script>
@stop
