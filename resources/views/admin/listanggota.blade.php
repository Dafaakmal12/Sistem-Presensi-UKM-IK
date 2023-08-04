@extends('layouts.admin')
@section('content')
<div class="flex justify-center items-center border-2 mb-2 py-2">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-white ">Daftar Anggota</h2>
</div>


<div class="flex justify-end mb-4">
    <form action="{{ route('admin.anggota') }}" method="GET">
        @csrf
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
            Tambah Anggota
        </button>
    </form>
</div>



<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full border-collapse text-sm text-left text-gray-500 dark:text-gray-400 border-2 border-black ">
        <!-- Table header -->
        <thead class="text-xs text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Fakultas
                </th>
                <th scope="col" class="px-6 py-3">
                    Jurusan
                </th>
                <th scope="col" class="px-6 py-3">
                    Nra
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white border-2 border-collapse border-black">

            @if($users->count() == 0)
            <tr>
                <td colspan="5" class="text-center">Tidak ada data</td>
            </tr>
            @endif



            @foreach ($users as $user)
            <tr>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $user->fakultas }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->jurusan }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->nra }}
                </td>
                <td class="px-6 py-4">
                    <button data-modal-target="defaultModal-{{$user->id}}"
                        data-modal-toggle="defaultModal-{{$user->id}}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="button">
                        Show
                    </button>
                    <form action="{{route('admin.update', $user->id)}}" method="GET">
                        @csrf
                        @method('GET')
                        <button type="submit"
                            class="font-medium text-green-600 dark:text-green-500 hover:underline">Update</button>
                    </form>
                    <form action="{{route('admin.anggota.delete', $user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Main modal -->
            <div id="defaultModal-{{$user->id}}" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                <div class="relative w-full h-full max-w-2xl md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Email dan Password
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="defaultModal-{{$user->id}}">
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
                        <div class="p-6 space-y-6">
                            <h3>Email: {{ $user->email }}</h3>
                            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                password: {{ $user->password }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
        </tbody>
    </table>
</div>
@endsection