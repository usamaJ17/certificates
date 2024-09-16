<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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


        @media (min-width: 1200px) {

            .overlay-text_first {
                top: 9.5%;
                left: 5%;
                font-weight: 600;
                font-size: 43px;
            }

            .overlay-text_award {
                top: 23.5%;
                left: 5%;
                font-size: 25px;
            }

            .overlay-text_name {
                top: 28.5%;
                left: 5%;
                font-size: 59px;
            }

            .overlay-text_desc {
                top: 44.5%;
                left: 5%;
                font-size: 40px;
            }

            .overlay-text_reg {
                top: 73.7%;
                left: 11.4%;
                font-size: 27px;
            }

            .overlay-text_sign {
                top: 91.9%;
                left: 10.3%;
                font-size: 16px;
            }

            .ceo_name {
                margin-left: 25%;
            }
        }
    </style>
</head>
<body>
    <div class="card ">
        <div class="card-body" style="padding: 0">
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
    </div>
</body>
</html>
