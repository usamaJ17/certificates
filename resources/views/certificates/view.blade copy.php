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
    <div class="row">

        <div class="col-lg-9">
            <div class="card ">
                <div class="card-body">
                    <img src="{{ asset($image) }}" alt="Certificate Image">
                    <div class="overlay-text overlay-text_first" style="font-family: Arial, Helvetica, sans-serif">
                        Certificate of Completion
                    </div>
                    <div class="overlay-text overlay-text_award" style="font-family: Arial, Helvetica, sans-serif">
                        Awarded To
                    </div>
                    <div class="overlay-text overlay-text_name" style="font-family: Arial, Helvetica, sans-serif">
                        {{ $certificate->name }}
                    </div>
                    <div class="overlay-text overlay-text_desc" style="font-family: Arial, Helvetica, sans-serif">
                        Who has successfully completed <br> the {{ $certificate->title }} <br> Academic Year
                        {{ $certificate->year }}
                    </div>
                    <div class="overlay-text overlay-text_reg" style="font-family: Arial, Helvetica, sans-serif">
                        No. {{ $certificate->code }}
                    </div>
                    <div class="overlay-text overlay-text_sign"
                        style="font-family: Arial, Helvetica, sans-serif;padding-top:3px">
                        <span class="ceo_name"> Tariq Chauhan </span><br>
                        <span> Group Chief Executive Officer </span>
                    </div>
                </div>


                {{-- <form action="{{ route('import.excel') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Certificate Title</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter title">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Year</label>
                                        <input type="text" class="form-control" id="year" name="year"
                                            placeholder="Year (2023-2024)">
                                    </div>
                                </div>
                            </div>
                            <label for="exampleInputFile">Upload Excel</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="excel" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form> --}}
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Certificate Details</h3>
                </div>
                <div class="card-body">
                    <h3 class="card-title"><strong>Certificate Recipient:</strong></h3>
                    <br>
                    <h3 class="card-title">Usama Jalal</h3> <br>
                    <h3 class="card-title"><strong>Issued by:</strong></h3>
                    <br>
                    <h3 class="card-title">EFS</h3> <br>
                    <h3 class="card-title"><strong>Issued On:</strong></h3>
                    <br>
                    <h3 class="card-title">August 2024</h3> <br>
                    <div class="row" style="margin-top:10px">
                        <button class="col-5 btn bg-gradient-success btn-sm"><i class="fas fa-download"></i>
                            Download</button>
                        <div class="col-1"></div>
                        <button id="share_cert" class="col-5 btn bg-gradient-info btn-sm"><i
                                class="fas fa-share-square"></i>
                            Share</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        /* Default width for mobile devices */
        .cus_width {
            width: 100%;
            /* Set a default width, will be overridden by media queries */
        }

        @media (min-width: 576px) {

            .cus_width {
                max-width: 540px !important;
            }
        }

        @media (min-width: 768px) {

            .cus_width {
                max-width: 720px !important;
            }
        }

        @media (min-width: 992px) {

            .cus_width {
                max-width: 960px !important;
            }
        }

        @media (min-width: 1200px) {

            .cus_width {
                max-width: 1440px !important;
            }
        }

        card-body {
            position: relative;
            display: inline-block;
            /* Ensure container fits image width */
            width: 100%;
            /* Ensure container is responsive */
            max-width: 600px;
            /* Optional: limit the maximum width */
            height: auto;
            /* Maintain aspect ratio */
        }

        .card-body img {
            width: 100%;
            height: auto;
            display: block;
            /* Remove any bottom space */
        }

        .overlay-text {
            position: absolute;
        }

        .overlay-text_first {
            color: #002060;
            font-weight: 500;
        }

        .overlay-text_award {
            color: #002060;
            font-weight: 500;
        }

        .overlay-text_name {
            color: #002060;
            font-weight: 500;
        }

        .overlay-text_desc {
            color: #002060;
            font-weight: 500;
        }

        .overlay-text_reg {
            color: #002060;
            font-weight: 400;
        }

        .overlay-text_sign {
            color: #111111;
            font-weight: 600;
            border-top: 2px solid #111111;
        }

        @media (max-width: 320px) {

            .overlay-text_first {
                top: 17.5%;
                left: 8%;
                font-size: 10px;
            }

            .overlay-text_award {
                top: 26.5%;
                left: 8%;
                font-size: 8px;
            }

            .overlay-text_name {
                top: 30.5%;
                left: 8%;
                font-size: 17px;
            }

            .overlay-text_desc {
                top: 44.5%;
                left: 8%;
                font-size: 8px;
            }

            .overlay-text_reg {
                top: 68.5%;
                left: 15.6%;
                font-size: 4.5px;
            }

            .overlay-text_sign {
                top: 85.9%;
                left: 11.0%;
                font-size: 5px;
            }

            .ceo_name {
                margin-left: 25%;
            }
        }

        @media (min-width: 321px) and (max-width: 430px) {

            .overlay-text_first {
                top: 15.5%;
                left: 8%;
                font-size: 12px;
            }

            .overlay-text_award {
                top: 26.5%;
                left: 8%;
                font-size: 10px;
            }

            .overlay-text_name {
                top: 30.5%;
                left: 8%;
                font-size: 21px;
            }

            .overlay-text_desc {
                top: 43.5%;
                left: 8%;
                font-size: 11px;
            }

            .overlay-text_reg {
                top: 70.2%;
                left: 14%;
                font-size: 6px;
            }

            .overlay-text_sign {
                top: 87.9%;
                left: 9.5%;
                font-size: 7px;
            }

            .ceo_name {
                margin-left: 25%;
            }
        }

        @media (min-width: 768px) {

            .overlay-text_first {
                top: 13.5%;
                left: 5%;
                font-size: 19px;
            }

            .overlay-text_award {
                top: 23.5%;
                left: 5%;
                font-size: 13px;
            }

            .overlay-text_name {
                top: 27.5%;
                left: 5%;
                font-size: 41px;
            }

            .overlay-text_desc {
                top: 41.5%;
                left: 5%;
                font-size: 21px;
            }

            .overlay-text_reg {
                top: 70.9%;
                left: 12.3%;
                font-size: 12px;
            }

            .overlay-text_sign {
                top: 89.9%;
                left: 11.5%;
                font-size: 10px;
            }

            .ceo_name {
                margin-left: 25%;
            }
        }

        @media (min-width: 992px) {

            .overlay-text_first {
                top: 12.5%;
                left: 5%;
                font-size: 22px;
            }

            .overlay-text_award {
                top: 23.5%;
                left: 5%;
                font-size: 14px;
            }

            .overlay-text_name {
                top: 27.5%;
                left: 5%;
                font-size: 41px;
            }

            .overlay-text_desc {
                top: 41.5%;
                left: 5%;
                font-size: 22px;
            }

            .overlay-text_reg {
                top: 70.9%;
                left: 12.5%;
                font-size: 12px;
            }

            .overlay-text_sign {
                top: 89.9%;
                left: 11.5%;
                font-size: 10px;
            }

            .ceo_name {
                margin-left: 25%;
            }
        }

        @media (min-width: 1200px) {

            .overlay-text_first {
                top: 11.5%;
                left: 5%;
                font-size: 34px;
            }

            .overlay-text_award {
                top: 23.5%;
                left: 5%;
                font-size: 16px;
            }

            .overlay-text_name {
                top: 27.5%;
                left: 5%;
                font-size: 56px;
            }

            .overlay-text_desc {
                top: 41.5%;
                left: 5%;
                font-size: 31px;
            }

            .overlay-text_reg {
                top: 71.9%;
                left: 11.5%;
                font-size: 18px;
            }

            .overlay-text_sign {
                top: 89.9%;
                left: 11.5%;
                font-size: 16px;
            }

            .ceo_name {
                margin-left: 25%;
            }
        }
    </style>
@stop

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        document.querySelector('.container').classList.add('cus_width');
        $(document).ready(function() {
            $('#share_cert').on('click', function() {
                navigator.clipboard.writeText(window.location.href);
                Toastify({
                    text: "Share Link Coppied",
                    duration: 3000,
                    newWindow: true,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "left", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                }).showToast();
            });

        });
    </script>
@stop
