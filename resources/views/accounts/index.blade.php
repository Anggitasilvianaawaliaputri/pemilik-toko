@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Daftar Akun</h1>
    <a href="{{ route('accounts.create') }}" class="btn btn-primary mb-3">Tambah Akun</a>
    
    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    <tr>
                        <td>{{ $account->id }}</td>
                        <td>{{ $account->nama }}</td>
                        <td>{{ $account->email }}</td>
                        <td>{{ $account->jabatan }}</td>
                        <td>
                            <center><a href="{{ route('accounts.edit', $account->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('accounts.destroy', $account->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button></center>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    // Menghilangkan notifikasi setelah 5 detik
    window.onload = function() {
        var alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(function() {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 500);
            }, 5000);
        }
    };
</script>

<style>
    /* Custom Styles for Table */
    table {
        margin-top: 20px;
        border-collapse: collapse;
    }

    th, td {
        padding: 15px;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: white;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    
    }

    button {
        text-align: center;
    }
</style>
@endsection
