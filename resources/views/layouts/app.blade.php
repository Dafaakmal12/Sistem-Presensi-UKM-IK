<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Responsive Styles */
        @media (max-width: 768px) {
            .lg\:grid {
                grid-template-columns: 1fr;
            }
        }

        @media (min-width: 768px) {
            .lg\:col-span-12 {
                grid-column: span 12 / span 12;
            }
        }

        /* Add styles for the logo */
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 0;
        }

        .logo-container img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <section class="bg-white dark:bg-gray-900">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <!-- Updated: Add new div for logo container -->
            <div class="lg:col-span-12 logo-container">
                <img alt="Night" class="w-64 h-auto" src="http://127.0.0.1:8000/IK.png">
            </div>

            <main aria-label="Main" class="flex items-center justify-center px-4 sm:px-8 lg:col-span-12 lg:py-12 lg:px-16">
                @yield('content')
            </main>
        </div>
    </section>
</body>

</html>
