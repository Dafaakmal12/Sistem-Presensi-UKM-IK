@extends('layouts.admin')
@section('content')
    <h1 class="text-4xl font-bold my-4">Membuat Agenda Baru</h1>
    <form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
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
            <input type="time" id="startTime" name="startTime"  required>
        </div>
        <div class="mb-6">
            <label for="endTime">Agenda Berakhir :</label>
            <input type="time" id="endTime" name="endTime" required>
        </div>
        <div class="mb-6">
            <label for="documentFile">documentFile</label>
            <input type="file" id="documentFile" name="documentFile" required>
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

     @if(session('notification'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const notification = @json(session('notification'));
                const toast = document.createElement('div');
                toast.textContent = notification.message;
                
toast.style.top = '2rem';
toast.style.right = '27rem'; // You can adjust the 'right' value as needed
toast.style.padding = '0.5rem';
toast.style.position = 'fixed';
toast.style.borderRadius = '0.375rem';
toast.style.backgroundColor = notification.type === 'success' ? '#48BB78' : '#F56565';
toast.style.color = 'white';

                document.body.appendChild(toast);
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 5000);
                
            });
        </script>
    @endif
@endsection
