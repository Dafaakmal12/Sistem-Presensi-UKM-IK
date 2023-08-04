@extends('layouts.admin')

@section('content')

<head>
    <!-- ... other meta tags and stylesheets ... -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.2/xlsx.full.min.js"></script> -->
</head>

<div class="flex justify-center items-center border-2 mb-2 py-2">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-white ">Daftar Presensi Agenda</h2>
</div><br />
<form action="{{ route('admin.attendance') }}" method="GET">
    @csrf
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full border-collapse text-sm text-left text-gray-500 dark:text-gray-400 border-2 border-black ">
            <!-- Table header -->
            <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
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
            <tbody class="bg-white border-2 border-collapse border-black">
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
                        <a href="{{ route('agenda.download', $item->id) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Download
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <button data-modal-target="defaultModal-{{$item->id}}"
                            data-modal-toggle="defaultModal-{{$item->id}}"
                            class="font-medium text-green-600 dark:text-green-500 hover:underline" type="button">
                            Detail Presensi
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</form>

@foreach($agenda as $item)
<!-- Main modal -->
<div id="defaultModal-{{$item->id}}" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full h-full p-4 md:p-0 md:inset-0">
    <div class="relative w-full h-full max-w-2xl mx-auto bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal content -->
        <div class="p-4 md:p-6 space-y-6 h-full flex flex-col">
            <div class="flex items-start justify-between pb-4 border-b">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Deskripsi Agenda
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 md:p-2 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="defaultModal-{{$item->id}}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flex-grow overflow-y-auto">
                <h3 class="mb-6">{!! nl2br(e($item->deskripsi)) !!}</h3>
                <h4 class="text-2xl font-bold text-center">Daftar Hadir {{ $item->nama }}</h4>
                <a href="{{ route('export', $item->id) }}"
                    class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 focus:outline-none focus:bg-blue-600 float-right">
                    Export
                </a>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3">No</th>
                                <th class="px-6 py-3">NRA</th>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Replace this with your Blade loop to show the attendance data -->
                            @foreach($item->attendance as $att)
                            <tr>
                                <td class="px-6 py-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $att->user->nra }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $att->user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $att->isAttend }}
                                </td>
                            </tr>
                            @endforeach
                            <!-- You can add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach
<!-- <script>
    function exportToExcel(sheetName) {
        var rows = [
            ['No', 'NRA', 'Nama', 'Status'],
            <?php /*$count = 1; ?>
            <?php foreach ($agenda->attendance as $item): ?>
                ['<?= $count++ ?>', '<?= $item->user->nra ?>', '<?= $item->user->name ?>', '<?= $item->status ?>'],
                // Add more rows as needed
            <?php endforeach; */?>
        ];

        var sheet = XLSX.utils.aoa_to_sheet(rows);
        var workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, sheet, sheetName);

        /* Export the workbook */
        XLSX.writeFile(workbook, sheetName + '.xlsx');
    }
</script> -->
@endsection