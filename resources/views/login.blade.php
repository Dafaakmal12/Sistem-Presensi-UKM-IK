@extends('layouts.app')
@section('content')
<form method="POST" class="w-full max-w-md mx-auto" action="{{ route('login.authenticate') }}">
    {{ method_field('POST') }}
    @csrf
    @if ($errors->any())
    <div class="p-4 mb-4 text-sm text-red-800 text-center rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
        role="alert">
        @foreach ($errors->all() as $error)
        <li class="list-none">{{ $error }}</li>
        @endforeach
    </div>
    @endif
    @if(session('success'))
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        alert("{{ session('success') }}");
    });
    </script>
    @endif
    <div class="text-center mb-4 ">
        <!-- Reduced the margin-bottom to 4 -->
        <h2 class="text-2xl font-semibold mb-2">Log in</h2> <!-- Reduced the margin-bottom to 2 -->
        <p class="text-lg">Log in to access your account.</p><br>
    </div>
    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
        <input type="email" id="email" name="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="ukmik@ukmik.com" required>
    </div>
    <div class="mb-6">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" id="password" name="password"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required>
    </div>
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Login
    </button>
</form>
@endsection



<style>
/* Responsive Styles */
@media (max-width: 768px) {
    form {
        padding: 0 1rem;
        /* Add some horizontal padding on small screens */
    }

    .text-center {
        /* Center align text on small screens */
        text-align: center;
    }
}
</style>