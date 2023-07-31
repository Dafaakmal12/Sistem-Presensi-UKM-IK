@extends('layouts.user')

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
                                File
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
        </thead>
        <tbody>
        @if($agendas->count() == 0)
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data</td>
                        </tr>
                        @endif
                        @foreach($agendas as $item)

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
                                <a href="{{ route('agenda.download', $item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Download</a>
                            </td>
                            </td>
                            <td class="px-6 py-4">
                                <button data-modal-target="defaultModal-{{$item->id}}" data-modal-toggle="defaultModal-{{$item->id}}" class="font-medium text-green-600 dark:text-green-500 hover:underline" type="button">
                                    Detail
                                </button>

                                <!-- <form action="{{ route('agenda.updateagenda', $item->id) }}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="font-medium text-green-600 dark:text-green-500 hover:underline">Update</button>
                                </form>

                                <form action="{{ route('agenda.delete', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        Delete</button>
                                </form> -->
                            </td>
                        </tr>

                        <!-- Main modal -->
                        <div id="defaultModal-{{$item->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-2 right-0 z-50 hidden w-full p-4 md:inset-0">
                            <div class="relative w-full h-full max-w-2xl mx-auto bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal content -->
                                <div class="p-4 md:p-6 space-y-6">
                                    <div class="flex items-start justify-between pb-4 border-b">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Deskripsi Agenda
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 md:p-2 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal-{{$item->id}}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="max-h-80 md:max-h-full overflow-y-auto">
                                        <h3>{!! nl2br(e($item->deskripsi)) !!}</h3>
                                    </div>
                                    <!-- Button Presensi -->
                                    @if ($item->dateTime <= now())
            @if ($item->startTime <= now() && $item->endTime >= now())
                {{-- If current time is within the item's startTime and endTime --}}
                @if($item->attendanceStatus)
                    <button type="button" class="w-full p-3 text-white bg-yellow-600 rounded-md shadow-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:ring-opacity-50 cursor-not-allowed" disabled>Already Attended</button>
                @else
                    <form action="{{ route('users.attendance') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_event" value="{{ $item->id }}">
                        <input type="hidden" name="tanggal" value="{{ $item->dateTime }}">
                        <button class="w-full p-3 text-white bg-yellow-600 rounded-md shadow-md hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-600 focus:ring-opacity-50" type="submit">Presensi</button>
                    </form>
                @endif
            @else
                {{-- If the item's dateTime is in the past and the current time is not within startTime and endTime --}}
                <span>This event has ended.</span>
            @endif
        @else
            {{-- If the item's dateTime is in the future --}}
            <span>This event has not started yet.</span>
        @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
        </tbody>
    </table>
</div>


@endsection
