@extends('layouts.user')

@section('content')
    <div class="p-4 sm:ml-4">
        <div class="p-4">
            
            <h1 class="text-3xl font-semibold mb-6">Dashboard</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <!-- Date Section -->
                <div class="flex items-center justify-center rounded bg-gradient-to-r from-cyan-500 to-blue-500 p-4">
                    <p class="text-white text-lg md:text-2xl lg:text-2xl font-bold">
                        {{ $date }}
                    </p>
                </div>
                <!-- Current Time Section -->
                <div class="flex flex-col items-center justify-center rounded transition-all duration-500 bg-gradient-to-t to-white via-blue from-red-500 bg-size-200 bg-pos-0 hover:bg-pos-100 p-4">
                    <p class="text-black text-lg md:text-2xl lg:text-2xl font-bold">
                        {{ $date }}
                    </p>
                    <p class="text-white text-md md:text-2xl lg:text-2xl font-bold" id="currentTime">
                        time
                    </p>
                </div>
                <!-- Agenda Section -->
                <div style="background-image: url(../images/Capa.svg);" class="flex flex-col items-center justify-center h-48 rounded bg-gray-50 dark:bg-gray-800 bg-cover p-4">
                    @if ($agenda)
                        <p class="text-white dark:text-gray-500 text-xl md:text-2xl mb-2">
                            Nama Agenda: {{ $agenda->nama }}
                        </p>
                        <p class="text-white dark:text-gray-500 text-xl md:text-2xl mb-2">
                            Tanggal: {{ $agenda->dateTime->format('d-m-Y') }}
                        </p>
                        <p class="text-white dark:text-gray-500 text-xl md:text-2xl mb-2">
                            Mulai: {{ $agenda->startTime->format('H:i') }} WIB
                        </p>
                        <p class="text-white dark:text-gray-500 text-xl md:text-2xl">
                            Selesai: {{ $agenda->endTime->format('H:i') }} WIB
                        </p>
                    @else
                        <p class="text-white dark:text-gray-500 text-xl md:text-2xl">
                            Tidak ada agenda
                        </p>
                    @endif
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-4">
                <h2 class="text-2xl font-semibold mb-4">Aktivitas Pengguna</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Sample User Activity Cards -->
                    <!-- You can replace these sample cards with actual data from your application -->
                    <div class="border border-gray-300 p-4 rounded-lg">
                        <p class="text-lg font-semibold mb-2">User 1</p>
                        <p class="text-sm text-gray-500">Logged in 30 mins ago</p>
                    </div>
                    <div class="border border-gray-300 p-4 rounded-lg">
                        <p class="text-lg font-semibold mb-2">User 2</p>
                        <p class="text-sm text-gray-500">Registered 2 hours ago</p>
                    </div>
                    <div class="border border-gray-300 p-4 rounded-lg">
                        <p class="text-lg font-semibold mb-2">User 3</p>
                        <p class="text-sm text-gray-500">Logged in 1 hour ago</p>
                    </div>
                    <div class="border border-gray-300 p-4 rounded-lg">
                        <p class="text-lg font-semibold mb-2">User 4</p>
                        <p class="text-sm text-gray-500">Registered 1 day ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Get the current time and display it regularly
        function displayTime() {
            var time = new Date();
            var hours = time.getHours();
            var minutes = time.getMinutes();
            var seconds = time.getSeconds();
            var session = "AM";
            if (hours == 0) {
                hours = 12;
            }
            if (hours > 12) {
                hours = hours - 12;
                session = "PM";
            }
            hours = (hours < 10) ? "0" + hours : hours;
            minutes = (minutes < 10) ? "0" + minutes : minutes;
            seconds = (seconds < 10) ? "0" + seconds : seconds;
            var currentTime = hours + ":" + minutes + ":" + seconds + " " + session;
            document.getElementById("currentTime").innerHTML = currentTime;
            setTimeout(displayTime, 1000);
        }
        displayTime();
    </script>
@endsection
