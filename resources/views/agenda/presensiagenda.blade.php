@extends('layouts.admin')

@section('content')
<form action="{{ route('agenda.presensiagenda', $agenda->id) }}" method="GET">
    @csrf
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Agenda
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Waktu Presensi
                    </th>
                </tr>
            </thead>
            <!-- Your table body here -->
        </table>
    </div>
</form>
@endsection
