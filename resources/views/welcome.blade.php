<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
    <title>EFS Certification Portal</title>
</head>

<body class="text-gray-800 antialiased">
    <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 ">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                <a href="#" class="inline-block mr-4 py-2">
                    <img src="{{ asset('frontend/assets/img/logo.svg') }}" alt="Tailwind Starter Kit Logo"
                        class="h-10">
                </a>
            </div>
            <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
                id="example-collapse-navbar">
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="https://www.facebook.com/efsme"><i
                                class="lg:text-gray-300 text-gray-500 fab fa-facebook text-lg leading-lg "></i><span
                                class="lg:hidden inline-block ml-2">Facebook</span></a>
                    </li>
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="https://www.linkedin.com/company/efs-facilities-services-group/mycompany/"><i
                                class="lg:text-gray-300 text-gray-500 fab fa-linkedin text-lg leading-lg "></i><span
                                class="lg:hidden inline-block ml-2">LinkedIn</span></a>
                    </li>
                    <li class="flex items-center">
                        <a href="{{ route('login') }}"><button
                                class="bg-gray-900 text-white active:bg-gray-500 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                style="transition: all 0.15s ease 0s;">
                                Login
                            </button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
            <div class="absolute top-0 w-full h-full bg-center bg-cover"
                style='background-image: url("https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80");'>
                <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-gradient-to-r"
                    style="background-image: linear-gradient(to right, #933EB6, #4E4EB1);"></span>
            </div>
            <div class="container relative mx-auto">
                <div class="items-center flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                        <div class="pr-12">
                            <h1 class="text-white font-semibold text-5xl">
                                Solutions to transform your organization's digital credentialing program
                            </h1>
                            <p class="mt-4 text-xl text-gray-300">
                                Advance your career and skills through EFS training programs, and earn a verified
                                certificate from EFS
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                style="height: 70px;bottom: -2px">
                <svg class="absolute overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                    version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div> --}}
        </div>
        {{-- <section class="pb-20 bg-white -mt-24">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap">
                    <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                                    <i class="fas fa-award"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Awarded Agency</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Divide details about your product or agency work into parts.
                                    A paragraph describing a feature will be enough.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400">
                                    <i class="fas fa-retweet"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Free Revisions</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Keep you user engaged by providing meaningful information.
                                    Remember that by this time, the user is curious.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400">
                                    <i class="fas fa-fingerprint"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Verified Company</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Write a few lines about each one. A paragraph describing a
                                    feature will be enough. Keep you user engaged!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap items-center mt-32">
                    <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                        <div
                            class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100">
                            <i class="fas fa-user-friends text-xl"></i>
                        </div>
                        <h3 class="text-3xl mb-2 font-semibold leading-normal">
                            EFS as a company
                        </h3>
                        <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700">
                        </p>
                        <p class="text-lg font-light leading-relaxed mt-0 mb-4 text-gray-700">
                            EFS is a regional leader and leading integrated facilities management company across 25
                            countries. Starting from a small platform, we have grown to manage more than 75 million sq.
                            meters of area with 40 operating companies. With consistency and dedication, EFS has
                            surpassed 2.5 billion USD in contract backlog, achieving 97% client retention.
                        </p>
                    </div>
                    <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg "
                            style="background-color: #002D5B">
                            <img alt="..." src="{{ asset('frontend/assets/img/about.webp') }}"
                                class="w-full align-middle rounded-t-lg" />
                            <blockquote class="relative p-8 mb-4">
                                <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95"
                                    class="absolute left-0 w-full block" style="height: 95px; top: -94px;">
                                    <polygon points="-30,95 583,95 583,65" style="background-color: #002D5B"
                                        class="fill-current">
                                    </polygon>
                                </svg>
                                <h4 class="text-xl font-bold text-white">
                                    Top Notch Services
                                </h4>
                                <p class="text-md font-light mt-2 text-white">
                                    EFS Facilities Services offers multicultural professional employment for its
                                    associates. We take pride in accreditation and recognition for employee happiness
                                    and welfare.
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="pb-20 relative block bg-white">
            <div class="bottom-auto left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                style="height: 80px;top: 2px">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
            <div class="container mx-auto px-4 lg:pt-24 lg:pb-64 ">
                <div class="flex flex-wrap text-center justify-center">
                    <div class="w-full lg:w-6/12 px-4">
                        <h2 class="text-4xl font-semibold text-gray-900">Verify Certificate</h2>
                        <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-600">
                            Easily verify any certificate by entering the certificate number for instant confirmation of
                            its authenticity.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative block py-24 lg:pt-0 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
                    <div class="w-full lg:w-6/12 px-4">
                        <div
                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white">
                            <div class="flex-auto p-5 lg:p-10">
                                <div class="relative w-full mb-3 mt-8">
                                    <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                        for="full-name">Certificate Number</label>
                                    <input type="text"
                                        class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                        placeholder="Certificate Number" id="certificate_code"
                                        style="transition: all 0.15s ease 0s;" />
                                </div>
                                <div class="text-center mt-6">
                                    <button
                                        class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                        type="button" style="transition: all 0.15s ease 0s;" id="verify">
                                        Verify
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="relative bg-white-300 pt-8 pb-6" style="margin-top: 0.12rem;">
        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px;">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4">
                    <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
                    <h5 class="text-lg mt-0 mb-2 text-gray-700">
                        Find us on any of these platforms
                    </h5>
                    <div class="mt-6">
                        <a href="https://www.linkedin.com/company/efs-facilities-services-group/mycompany"><button
                            class="bg-white text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                            type="button">
                            <i class="flex fab fa-linkedin"></i></button>
                        </a>
                        <a href="https://www.facebook.com/efsme"><button
                            class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                            type="button">
                            <i class="flex fab fa-facebook-square"></i></button>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-400" />
            <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                    <div class="text-sm text-gray-600 font-semibold py-1">
                        Copyright © 2024 EFS
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }
    $('#verify').on('click', function() {
        let code = $('#certificate_code').val();
        console.log(code);
        $.ajax({
            url: '/certificates/verify', // Fix the URL format
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // Laravel requires a CSRF token for DELETE requests
                code: code
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
</script>

</html>
