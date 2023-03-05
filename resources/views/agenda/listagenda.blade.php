@extends('layouts.admin')
@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama Agenda
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal
                </th>
                <th scope="col" class="px-6 py-3">
                    Mulai
                </th>
                <th scope="col" class="px-6 py-3">
                    Berakhir
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if($agenda->count() == 0)
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data</td>
                </tr>
            @endif
            @foreach($agenda as $item)
            <tr>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $item->nama }}
                </th>
                <td class="px-6 py-4">
                    {{ $item->dateTime->format('d-m-Y') }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->startTime->format('H:i') }} WIB
                </td>
                <td class="px-6 py-4">
                    {{ $item->endTime->format('H:i') }} WIB
                </td>
                <td class="px-6 py-4">
                    <form action="{{ route('agenda.delete', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline">
                            Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
@endsection