@extends('adminlte::page')

@section('title', 'Edit Certificate')

@section('content_header')
    <h1>Edit Certificate</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Certificate</h3>
                </div>

                <form action="{{ route('admin.certificates.update', $certificate->id) }}" method="POST">
                    @csrf
                    @method('PUT') {{-- For updating resources --}}
                    <input type="hidden" name="cert_id" value="{{ $certificate->id }}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $certificate->name }}" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="employee_id">Employee ID</label>
                                    <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ $certificate->employee_id }}" placeholder="Enter Employee ID">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="opco">OPCO</label>
                                    <input type="text" class="form-control" id="opco" name="opco" value="{{ $certificate->opco }}" placeholder="Enter OPCO">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $certificate->email }}" placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="title">Certificate For</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $certificate->title }}" placeholder="Enter Certificate Title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="year">Academic Year</label>
                                    <input type="text" class="form-control" id="year" name="year" value="{{ $certificate->year }}" placeholder="Enter Academic Year">
                                </div>
                            </div>
                        </div>

                        <h3>Marks</h3>
                        <div class="row">
                            <div id="marks-container">
                                @foreach($certificate->fields as $key => $field)
                                    <div class="row mark-row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="mark_{{ $key }}">Name</label>
                                                <input type="text" class="form-control" id="mark_{{ $key }}" name="mark_{{ $key }}" value="{{ $field->name }}" placeholder="Module Name">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="value_{{ $key }}">Value</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" step="0.01" class="form-control mark-value" id="value_{{ $key }}" name="value_{{ $key }}" value="{{ $field->score }}" placeholder="Percentage">
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
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-success" id="add-row">Add Row</button>
                        </div>

                        <div class="form-group">
                            <label for="score">Total</label>
                            <div class="input-group mb-3">
                                <input type="number" step="0.01" class="form-control" id="score" name="score" value="{{ $certificate->score }}" placeholder="Total Percentage">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Certificate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            let markIndex = {{ $certificate->fields->count() }};  // Start from the current number of fields

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
                                    <input type="number" step="0.01" class="form-control mark-value" id="value_${markIndex}" name="value_${markIndex}" placeholder="Percentage">
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
