<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


</head>
<body class="font-sans bg-gray-900 text-white">
        <nav class="border-b border-gray-800">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
                <ul class="flex flex-col md:flex-row items-center">
                    <li>
                        <a href="#">
                            <img src={{ asset('src/img/Logo.svg') }} alt="Logo" class="w-24">
                        </a>
                    </li>
                    <li class="md:ml-8 mt-3 md:mt-0">
                        <a href="#" class="hover:text-gray-300">Movies</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="#" class="hover:text-gray-300">TV Shows</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="#" class="hover:text-gray-300">Actors</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="#" class="hover:text-gray-300">Genres</a>
                    </li>
                </ul>
                <div class="flex flex-col md:flex-row items-center justify-center">
                    <div class="relative">
                        <input type="text" class="bg-gray-800 pl-8 mt-3 md-mt-0 text-sm rounded-full w-48 lg:w-64 px-4 py-1 focus:outline-none focus:shadow-outline"
                        placeholder="Search">
                        <div class="absolute top-0">
                            <svg class="fill-current  w-5 text-gray-500 mt-4 ml-2"
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                                <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                              </svg>
                        </div>
                    </div>
                    <div class="md:ml-4 mt-3 md:mt-0">
                        <a href="#" class="flex items-center">
                            <img src={{ asset('src/img/avatar.jpg') }} alt="avatar" class="rounded-full w-8 h-8">
                            <p class="ml-3">Login</p>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
</body>
</html>
