@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f2f6fc, #e6ecf5, #f9fafc); 
        min-height: 100vh; 
        margin: 0;
    }
</style>

<div class="container mt-5">

    {{-- Animasi Heading --}}
    <h2 class="text-center mb-4 fw-bold animate__animated animate__fadeInDown">
        📋 Daftar Pesanan
    </h2>

    {{-- Tombol Tambah Pesanan --}}
    <div class="text-center mb-4 animate__animated animate__zoomIn">
        <a href="{{ route('pesanan.create') }}" class="btn btn-success shadow px-4 py-2" 
           style="border-radius: 10px; font-weight: 600; transition: 0.3s;">
           ➕ Tambah Pesanan
        </a>
    </div>

    {{-- Card Container --}}
    <div class="card shadow-lg border-0 animate__animated animate__fadeInUp" 
         style="border-radius: 15px; overflow: hidden;">
        <div class="card-body p-4" style="background: #ffffffb5;">

            {{-- Table --}}
            <table class="table table-hover text-center align-middle">
                <thead style="background: linear-gradient(90deg, #4cafef, #6fb1fc); color: white;">
                    <tr>
                        <th>ID</th>
                        <th>Pelanggan</th>
                        <th>Layanan</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Status</th>
                        @if(Auth::user()->role == 'admin')
                          <th>Karyawan</th>
                        @endif
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesanans as $p)
                    <tr class="animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                        <td>{{ $p->id }}</td>
                        <td class="fw-semibold">{{ $p->nama_pelanggan }}</td>
                        <td>{{ $p->layanan->nama_layanan }}</td>
                        <td>{{ $p->jumlah }}</td>
                        <td class="text-success fw-bold">Rp{{ number_format($p->total_harga,0,',','.') }}</td>
                        <td>
                            <span class="badge 
                                @if($p->status == 'pending') bg-warning text-dark 
                                @elseif($p->status == 'selesai') bg-success 
                                @else bg-secondary @endif">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                        @if(Auth::user()->role == 'admin')
                          <td>{{ $p->user->name }}</td>
                        @endif
                        <td>
                            <a href="{{ route('pesanan.edit',$p->id) }}" 
                               class="btn btn-warning btn-sm shadow-sm" 
                               style="border-radius: 8px; transition: 0.3s;">
                               ✏️ Edit
                            </a>
                            <form action="{{ route('pesanan.destroy',$p->id) }}" method="POST" style="display:inline">
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

{{-- Animate.css --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection
