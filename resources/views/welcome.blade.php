<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-gray-800 text-white">
        <header>
            <div class="fixed top-0 left-0 right-0 flex flex-row justify-between bg-white text-black pt-3 pb-3">
                <div>
                    <a class='text-2xl text-black hover:bg-gray-600 px-5 py-3 rounded transition duration-200 cursor-pointer'>
                        Dashboard
                    </a>
                    <a class='text-2xl text-black hover:bg-gray-600 px-5 py-3 rounded transition duration-200 cursor-pointer'>
                        Form
                    </a>
                </div>
                <div>
                    <a class='mr-2 text-2xl text-white bg-blue-600 hover:bg-blue-400 px-5 py-3 rounded transition duration-200 cursor-pointer'>
                        Sign UP
                    </a>
                    <a class='mr-2 text-2xl text-white bg-green-600 hover:bg-green-400 px-5 py-3 rounded transition duration-200 cursor-pointer'>
                        Sign IN
                    </a>
                </div>
            </div>
        </header>
        <div class="flex flex-col items-center justify-center min-h-screen text-center">
            <h1 class="text-5xl">
                Welcome to Student Registration!!!
            </h1><br/>
            <h2 class="text-4xl">
                <a class="cursor-pointer underline">Sign IN</a> OR 
                <a class="cursor-pointer underline">Sign UP</a> to continue!
            </h2>
        </div>
    </body>
</html>
