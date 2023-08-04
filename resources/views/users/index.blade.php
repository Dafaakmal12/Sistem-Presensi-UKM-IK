@extends('layouts.user')

@section('content')
<div class="p-4 sm:ml-4 h-screen">

    <div class="p-4">

        <h1 class="text-3xl font-semibold mb-6">Dashboard</h1>
        <p class="text-gray-600">Hello {{ Auth::user()->name }}, welcome back!</p>

        <!-- Current Time Section -->
        <div
            class="flex flex-col items-center justify-center rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 p-6 mb-1">
            <p class="text-white text-xl md:text-2xl lg:text-4xl font-bold">
                {{ $date }}
            </p>
            <div class="text-white text-4xl md:text-6xl lg:text-7xl font-bold" id="currentTime">
                00:00:00
            </div>
        </div>
        <br />

        <div className="card hidden lg:block lg:row-span-3 border border-2 border-black">
            <div className="w-full text-center">
                <h4 class="text-xl font-bold text-navy-700 dark:text-white">
                    Agenda Kegiatan Upcoming
                </h4>
                <p class="text-gray-600">Daftar Agenda!</p>
            </div>

            <div style="background: #4F709C;"
                class="flex flex-col items-center justify-center h-48 rounded bg-gray-50 dark:bg-gray-800 bg-cover p-4">
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
    </div>
</div>

<!-- JavaScript Section -->
<script>
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