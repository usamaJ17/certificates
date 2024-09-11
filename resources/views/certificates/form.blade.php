{{ Config::set('adminlte.layout_topnav', true) }}
@extends('adminlte::page')

@section('title', 'Import')

@section('content_header')
    <p></p>
@stop

@section('content_header')
    <p></p>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Verify Certificate</h3>
                    </div>
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="certificate_code">Certificate Code</label>
                                <input type="text" class="form-control" id="certificate_code"
                                    placeholder="Enter Certificate Number">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="verify">Verify</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
@stop

@section('css')
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#verify').on('click', function() {
            let code = $('#certificate_code').val();
            console.log(code);
            $.ajax({
                url: '/certificates/verify', // Fix the URL format
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' ,// Laravel requires a CSRF token for DELETE requests
                    code : code
                },
                success: function(response) {
                    if (response.found) {
                        window.location.href = "/certificates/view/" + code;
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: 'Certificate not found',
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
        });
    </script>
@stop
