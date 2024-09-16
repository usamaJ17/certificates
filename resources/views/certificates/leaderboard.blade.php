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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body class="text-gray-800 antialiased">
    <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 ">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                <a href="{{ route('welcome') }}" class="inline-block mr-4 py-2">
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
                        <a href="{{ route('certificates.leader') }}"><button
                            class="bg-gray-900 text-white active:bg-gray-500 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                            style="transition: all 0.15s ease 0s;">
                            Leaderboard
                        </button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="profile-page">
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="height: 500px;">
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
                                Our Top Performers
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                style="height: 70px;">
                <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <section class="relative py-16 bg-white">
            
            <div class="container mx-auto px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                    <div class="px-6">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                <div class="relative">
                                    <img alt="..." src="{{ asset('images/logo.jpeg') }}"
                                        class="shadow-xl rounded-full h-auto align-middle border-none"
                                        style="max-width: 150px;" />
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-12">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-8">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Employee Name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Employee Name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Score
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($certficates as $item)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="px-6 py-4">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $item->name }}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $item->employee_id }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $item->score }}
                                                </td>
                                                <td class="px-6 py-4 text-right">
                                                    <a href="{{ route('certificates.view', ['code' => $item->code]) }}"> 
                                                        <button
                                                            class="bg-gray-900 active:bg-gray-500 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
                                                            type="button" style="transition: all 0.15s ease 0s;">
                                                            <i class="fas fa-eye"></i> View
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-4">
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }
    $(document).ready(function() {

    });
</script>

</html>
