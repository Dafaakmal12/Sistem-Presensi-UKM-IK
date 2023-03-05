@extends('layouts.user')
@section('content')
    <div class="p-4 sm:ml-4">
        <div class="p-4">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-center h-24 rounded bg-gradient-to-r from-cyan-500 to-blue-500">
                    <p class="text-xs text-center md:text-2xl lg:text-2xl text-white font-bold">
                        {{ $date }}</p>
                </div>
                <div class="flex flex-col items-center justify-center h-24 rounded transition-all duration-500 bg-gradient-to-t to-white via-blue from-red-500 bg-size-200 bg-pos-0 hover:bg-pos-100 col-span-2">
                    <p class="text-xs text-center text-black font-bold">
                        {{ $date }}</p>
                    <p class="text-md text-center md:text-2xl lg:text-2xl text-white font-bold" id="currentTime">
                        time</p>
                </div>
            </div>
            <div style="background-image: url(../images/Capa.svg);" class="flex flex-col items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800 bg-cover">
                @if ($agenda)
                    <p class="text-2xl text-white dark:text-gray-500">
                        {{ $agenda->nama }}
                    </p>
                    <p class="text-2xl text-white dark:text-gray-500">
                        {{ $agenda->dateTime->format('d-m-Y') }}
                    </p>
                    <p class="text-2xl text-white dark:text-gray-500">
                        {{ $agenda->startTime->format('H:i') }} WIB
                    </p>
                    <p class="text-2xl text-white dark:text-gray-500">
                        {{ $agenda->endTime->format('H:i') }} WIB
                    </p>
                @else
                    <p class="text-2xl text-white dark:text-gray-500">
                        Tidak ada agenda
                    </p>
                @endif
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
