@extends('layouts.admin')
@section('content')
    <h1 class="text-4xl font-bold my-4">Membuat Agenda Baru</h1>
    <form action="{{ route('agenda.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Agenda</label>
            <input type="name" id="name" name="nama"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="name@flowbite.com" required>
        </div>
        <div class="mb-6">
            <label for="tempat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Agenda</label>
            <input type="tempat" id="tempat" name="tempat"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="name@flowbite.com" required>
        </div>
        <div class="mb-6">
            <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                Agenda</label>
            <textarea type="deksripsi" id="deskripsi" name="deskripsi"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required>
            </textarea>
        </div>
        <div class="mb-6">
            <label for="tanggal"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu(tanggal/bulan/tahun)</label>
            <p>Date: <input type="text" name="dateTime" id="datepicker"></p>
        </div>
        <div class="mb-6">
            <label for="startTime" >Agenda Mulai :</label>
            <input type="time" id="startTime" name="startTime" min="09:00" max="18:00" required>
        </div>
        <div class="mb-6">
            <label for="endTime">Agenda Berakhir :</label>
            <input type="time" id="endTime" name="endTime" min="09:00" max="18:00" required>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Membuat Agenda Baru</button>
    </form>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
@endsection
