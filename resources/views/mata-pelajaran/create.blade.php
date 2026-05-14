@extends('layouts.app')

@section('title', 'Tambah Mata Pelajaran')

@section('content')
<div class="mb-6 max-w-2xl mx-auto text-center">
    <h1 class="text-3xl font-bold text-gray-900">Tambah Mata Pelajaran Baru</h1>
    <p class="text-gray-600 mt-1">Isi formulir di bawah untuk menambahkan mata pelajaran baru ke dalam sistem</p>
</div>

<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
    <form action="{{ route('mata-pelajaran.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Nama Mata Pelajaran -->
        <div>
            <label for="nama_matpel" class="block text-sm font-medium text-gray-700 mb-1">
                Nama Mata Pelajaran <span class="text-red-500">*</span>
            </label>
            <input
                type="text"
                name="nama_matpel"
                id="nama_matpel"
                value="{{ old('nama_matpel') }}"
                placeholder="Contoh: Matematika, Bahasa Indonesia, IPA"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('nama_matpel') border-red-500 @enderror"
            >
            @error('nama_matpel')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-4 pt-4 border-t">
            <a href="{{ route('mata-pelajaran.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition">
                Batal
            </a>
            <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition shadow-md hover:shadow-lg">
                Simpan Mata Pelajaran
            </button>
        </div>
    </form>
</div>
@endsection
