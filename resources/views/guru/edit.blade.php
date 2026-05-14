@extends('layouts.app')
@php
/** @var \App\Models\Guru $guru */
/** @var \Illuminate\Support\Collection<int, \App\Models\MataPelajaran> $mataPelajarans */
/** @var array<int, int|string> $selectedMataPelajarans */
@endphp

@section('title', 'Edit Guru')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Edit Guru</h1>
    <p class="text-gray-600 mt-1">Perbarui informasi guru dan mata pelajaran yang diajarkan</p>
</div>

<div class="max-w-2xl bg-white rounded-lg shadow-md p-8">
    <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Nama Guru -->
        <div>
            <label for="nama_guru" class="block text-sm font-medium text-gray-700 mb-1">
                Nama Guru <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                name="nama_guru"
                id="nama_guru"
                value="{{ old('nama_guru', $guru->nama_guru) }}"
                placeholder="Masukkan nama guru"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('nama_guru') border-red-500 @enderror"
            >
            @error('nama_guru')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                Email <span class="text-red-500">*</span>
            </label>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email', $guru->email) }}"
                placeholder="Masukkan email guru"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('email') border-red-500 @enderror"
            >
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Alamat -->
        <div>
            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                Alamat
            </label>
            <textarea
                name="alamat"
                id="alamat"
                rows="3"
                placeholder="Masukkan alamat guru"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('alamat') border-red-500 @enderror"
            >{{ old('alamat', $guru->alamat) }}</textarea>
            @error('alamat')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Mata Pelajaran -->
        <div>
            <label for="mata_pelajarans" class="block text-sm font-medium text-gray-700 mb-2">
                Mata Pelajaran yang Diajarkan
            </label>
            <div class="space-y-2 max-h-48 overflow-y-auto border border-gray-300 rounded-lg p-4 bg-gray-50">
                @forelse ($mataPelajarans as $mataPelajaran)
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            name="mata_pelajarans[]"
                            id="mata_pelajaran_{{ $mataPelajaran->id }}"
                            value="{{ $mataPelajaran->id }}"
                            {{ in_array($mataPelajaran->id, $selectedMataPelajarans) ? 'checked' : '' }}
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer"
                        >
                        <label for="mata_pelajaran_{{ $mataPelajaran->id }}" class="ml-3 text-sm text-gray-700 cursor-pointer">
                            {{ $mataPelajaran->nama_matpel }}
                        </label>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">Belum ada mata pelajaran. <a href="{{ route('mata-pelajaran.create') }}" class="text-blue-600 hover:text-blue-800">Buat mata pelajaran baru</a></p>
                @endforelse
            </div>
        </div>

        <!-- Foto Guru -->
        <div>
            <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">
                Foto Guru
            </label>
            <input
                type="file"
                name="foto"
                id="foto"
                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('foto') border-red-500 @enderror"
            >
            <p class="text-xs text-gray-500 mt-1">Format: JPG/PNG, maksimal 2MB.</p>
            @if ($guru->foto)
                <div class="mt-3">
                    <p class="text-sm text-gray-600 mb-2">Foto saat ini:</p>
                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto {{ $guru->nama_guru }}" class="h-24 w-24 object-cover rounded-lg border border-gray-200">
                </div>
            @endif
            @error('foto')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-4 pt-4 border-t">
            <a href="{{ route('guru.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition shadow-md hover:shadow-lg">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
