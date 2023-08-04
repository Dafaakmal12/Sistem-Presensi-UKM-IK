@extends('layouts.admin')
@section('content')
<div class="grid grid-cols-111 gap-9 ">

    <h1 class="text-2xl font-semibold ">Dashboard</h1>
    <p class="text-gray-600">Hello Admin, welcome back!</p>
    <div
        class="flex flex-col items-center justify-center rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 p-6 mb-1">
        <p class="text-white text-xl md:text-2xl lg:text-4xl font-bold">
            {{ $date }}
        </p>
        <div class="text-white text-4xl md:text-6xl lg:text-7xl font-bold" id="currentTime">
            00:00:00
        </div>
    </div>
    <div class="flex justify-center gap-4 mb-2 ">

        <div class="col-span-4 md:col-span-2 lg:col-span-2 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
            style="background: #3A98B9;">
            <a>
                <img class="rounded-t-lg" src="https://unsplash.com/photos/rsx7gwCtglk" alt="" />
            </a>
            <div class="p-5">
                <a>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Daftar Anggota</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total Anggota</p>
                <a
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    10 List

                </a>
            </div>
        </div>


        <div class="col-span-4 md:col-span-2 lg:col-span-2 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
            style="background: #4F709C;">
            <a>
                <img class="rounded-t-lg" src="https://unsplash.com/photos/rsx7gwCtglk" alt="" />
            </a>
            <div class="p-5">
                <a>
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Daftar Agenda</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total Agenda</p>
                <a
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    10 List
                </a>
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