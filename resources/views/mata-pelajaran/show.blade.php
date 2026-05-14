@extends('layouts.app')

@section('title', 'Detail Mata Pelajaran')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Detail Mata Pelajaran</h1>
        <p class="text-gray-600 mt-1">Informasi lengkap tentang mata pelajaran</p>
    </div>
    <div class="flex gap-2">
        <a href="{{ route('mata-pelajaran.edit', $mataPelajaran->id) }}" class="px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg font-medium transition shadow-md hover:shadow-lg">
            Edit
        </a>
        <a href="{{ route('mata-pelajaran.index') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-lg font-medium transition shadow-md hover:shadow-lg">
            Kembali
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-8 space-y-6">
        <!-- Nama Mata Pelajaran -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-sm font-medium text-gray-600">Nama Mata Pelajaran</p>
                <p class="text-lg font-semibold text-gray-900 mt-2">{{ $mataPelajaran->nama_matpel }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600">ID Mata Pelajaran</p>
                <p class="text-lg font-semibold text-gray-900 mt-2">#{{ $mataPelajaran->id }}</p>
            </div>
        </div>

        <!-- Guru yang Mengajar -->
        <div class="border-t pt-6">
            <p class="text-sm font-medium text-gray-600 mb-3">Guru yang Mengajar Mata Pelajaran Ini</p>
            <div class="space-y-3">
                @forelse ($mataPelajaran->gurus as $guru)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                        <div>
                            <p class="font-medium text-gray-900">{{ $guru->nama_guru }}</p>
                            <p class="text-sm text-gray-600">{{ $guru->email }}</p>
                        </div>
                        <a href="{{ route('guru.show', $guru->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                            Lihat Detail
                        </a>
                    </div>
                @empty
                    <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <p class="text-yellow-800">
                            Belum ada guru yang mengajar mata pelajaran ini.
                            <a href="{{ route('guru.create') }}" class="font-medium underline hover:no-underline">Tambahkan guru baru</a>
                        </p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Metadata -->
        <div class="border-t pt-6 grid grid-cols-2 gap-4 text-sm">
            <div>
                <p class="text-gray-600">Dibuat pada</p>
                <p class="text-gray-900 font-medium">{{ $mataPelajaran->created_at->format('d M Y H:i') }}</p>
            </div>
            <div>
                <p class="text-gray-600">Diperbarui pada</p>
                <p class="text-gray-900 font-medium">{{ $mataPelajaran->updated_at->format('d M Y H:i') }}</p>
            </div>
        </div>
    </div>

    <!-- Delete Section -->
    <div class="bg-red-50 border-t border-red-200 px-8 py-6">
        <p class="text-sm text-red-700 mb-3">Zona Bahaya - Menghapus Mata Pelajaran</p>
        <form action="{{ route('mata-pelajaran.destroy', $mataPelajaran->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mata pelajaran ini? Tindakan ini tidak dapat dibatalkan.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition">
                Hapus Mata Pelajaran
            </button>
        </form>
    </div>
</div>
@endsection
