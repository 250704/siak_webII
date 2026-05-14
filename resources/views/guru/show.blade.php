@extends('layouts.app')
@php
/** @var \App\Models\Guru $guru */
@endphp

@section('title', 'Detail Guru')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Detail Guru</h1>
        <p class="text-gray-600 mt-1">Informasi lengkap tentang guru</p>
    </div>
    <div class="flex gap-2">
        <a href="{{ route('guru.edit', $guru->id) }}" class="px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg font-medium transition shadow-md hover:shadow-lg">
            Edit
        </a>
        <a href="{{ route('guru.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg font-medium transition shadow-md hover:shadow-lg">
            Kembali
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-8 space-y-6">
        @if ($guru->foto)
            <div class="border-b pb-6">
                <p class="text-sm font-medium text-gray-600 mb-3">Foto Guru</p>
                <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto {{ $guru->nama_guru }}" class="h-40 w-40 object-cover rounded-xl border border-gray-200">
            </div>
        @endif

        <!-- Nama Guru -->
        <div class="grid grid-cols-3 gap-4">
            <div>
                <p class="text-sm font-medium text-gray-600">Nama Guru</p>
                <p class="text-lg font-semibold text-gray-900 mt-2">{{ $guru->nama_guru }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600">Email</p>
                <p class="text-lg text-gray-900 mt-2">
                    <a href="mailto:{{ $guru->email }}" class="text-blue-600 hover:text-blue-800">{{ $guru->email }}</a>
                </p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600">ID Guru</p>
                <p class="text-lg font-semibold text-gray-900 mt-2">#{{ $guru->id }}</p>
            </div>
        </div>

        <!-- Alamat -->
        <div class="border-t pt-6">
            <p class="text-sm font-medium text-gray-600">Alamat</p>
            <p class="text-gray-900 mt-2">{{ $guru->alamat ?? 'Tidak ada informasi alamat' }}</p>
        </div>

        <!-- Mata Pelajaran -->
        <div class="border-t pt-6">
            <p class="text-sm font-medium text-gray-600 mb-3">Mata Pelajaran yang Diajarkan</p>
            <div class="flex flex-wrap gap-2">
                @forelse ($guru->mataPelajarans as $mataPelajaran)
                    <span class="inline-block bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full font-medium">
                        {{ $mataPelajaran->nama_matpel }}
                    </span>
                @empty
                    <p class="text-gray-500 italic">Guru ini belum mengajar mata pelajaran apapun</p>
                @endforelse
            </div>
        </div>

        <!-- Metadata -->
        <div class="border-t pt-6 grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-gray-600">Dibuat pada</p>
                <p class="text-gray-900 font-medium">{{ $guru->created_at->format('d M Y H:i') }}</p>
            </div>
            <div>
                <p class="text-gray-600">Diperbarui pada</p>
                <p class="text-gray-900 font-medium">{{ $guru->updated_at->format('d M Y H:i') }}</p>
            </div>
        </div>
    </div>

    <!-- Delete Section -->
    <div class="bg-red-50 border-t border-red-200 px-8 py-6">
        <p class="text-sm text-red-700 mb-3">Zona Bahaya - Menghapus Guru</p>
        <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus guru ini? Tindakan ini tidak dapat dibatalkan.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition">
                Hapus Guru
            </button>
        </form>
    </div>
</div>
@endsection
