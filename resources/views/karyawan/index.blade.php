@extends('layouts.app')

@section('content')
<div class="container mt-5">

    {{-- Judul dengan animasi --}}
    <h2 class="text-center mb-4 fw-bold animate__animated animate__fadeInDown">
        👥 Data Karyawan
    </h2>

    {{-- Tombol tambah --}}
    <div class="text-center mb-4 animate__animated animate__zoomIn">
        <a href="{{ route('karyawan.create') }}" 
           class="btn btn-success shadow px-4 py-2" 
           style="border-radius: 10px; font-weight: 600; transition: 0.3s;">
           ➕ Tambah Karyawan
        </a>
    </div>

    {{-- Card dengan tabel --}}
    <div class="card shadow-lg border-0 animate__animated animate__fadeInUp" 
         style="border-radius: 15px; overflow: hidden;">
        <div class="card-body p-4" style="background: #f9fafb;">

            <table class="table table-hover text-center align-middle">
                <thead style="background: linear-gradient(90deg, #50c9c3, #96deda); color: white;">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($karyawans as $k)
                    <tr class="animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                        <td>{{ $k->id }}</td>
                        <td class="fw-semibold">{{ $k->nama }}</td>
                        <td>{{ $k->email }}</td>
                        <td>{{ $k->telepon }}</td>
                        <td>
                            <a href="{{ route('karyawan.edit',$k->id) }}" 
                               class="btn btn-warning btn-sm shadow-sm" 
                               style="border-radius: 8px; transition: 0.3s;">
                               ✏️ Edit
                            </a>
                            <form action="{{ route('karyawan.destroy',$k->id) }}" method="POST" style="display:inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm shadow-sm" 
                                        style="border-radius: 8px; transition: 0.3s;">
                                    🗑 Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

{{-- Tambahan background soft biar full --}}
<style>
body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #f2f6fc, #eaf4f4, #fdfdfd);
}

/* Hover efek pada tombol */
.btn:hover {
    transform: scale(1.05);
    transition: 0.2s;
}
</style>

{{-- Animate.css --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection
