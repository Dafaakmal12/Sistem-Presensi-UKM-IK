<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    <! -- tailwindcss -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="bg-white dark:bg-gray-900">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <section class="relative flex h-32 items-end bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">
            <img alt="Night" src="http://127.0.0.1:8000/IK.png" class="absolute inset-0 h-[270px] w-[270px] object-cover opacity-80 " style="
    top: 200px;
    left: 179px;
">

                <div class="hidden lg:relative lg:block lg:p-12">
                    <a class="block text-white" href="/">
                        <span class="sr-only">Home</span>
                    </a>

                    <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
                        SISTEM PRESENSI UKM IK
                    </h2>

                    <p class="mt-4 leading-relaxed text-white/90">
                        @by <a href="https://github.com/Dafaakmal12" class="text-white underline">UKM IK</a>
                    </p>
                </div>
            </section>

            <main aria-label="Main"
                class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:py-12 lg:px-16 xl:col-span-6">
                @yield('content')
            </main>
        </div>
    </section>
</body>

</html>
