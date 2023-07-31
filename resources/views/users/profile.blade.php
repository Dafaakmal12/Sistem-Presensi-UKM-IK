@extends('layouts.user')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Profile Anggota</h1>
                    </div>
                    <div class="card-body">
                    <p><strong>Nama Lengkap:</strong> {{ $user->name }}</p>
                    <p><strong>NRA:</strong> {{ $user->nra }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Jurusan:</strong> {{ $user->jurusan }}</p>
                    <p><strong>Fakultas:</strong> {{ $user->fakultas }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Bootstrap JS and jQuery (optional, if you need JavaScript functionality) -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
