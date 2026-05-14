@extends('layouts.app')
@php
/** @var \Illuminate\Pagination\LengthAwarePaginator $gurus */
@endphp

@section('title', 'Data Guru')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Data Guru</h1>
        <p class="text-gray-600 mt-1">Kelola informasi guru dan mata pelajaran yang diajarkan</p>
    </div>
    <a href="{{ route('guru.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition duration-200 shadow-md hover:shadow-lg">
        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
        </svg>
        Tambah Guru
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-blue-600 to-blue-800 border-b border-blue-900">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-blue-100 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-blue-100 uppercase tracking-wider">Nama Guru</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-blue-100 uppercase tracking-wider">Foto</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-blue-100 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-blue-100 uppercase tracking-wider">Alamat</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-blue-100 uppercase tracking-wider">Mata Pelajaran</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-blue-100 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($gurus as $guru)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loop->iteration + ($gurus->currentPage() - 1) * $gurus->perPage() }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">{{ $guru->nama_guru }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            @if ($guru->foto)
                                <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto {{ $guru->nama_guru }}" class="h-12 w-12 rounded-full object-cover border border-gray-200">
                            @else
                                <span class="text-gray-400 italic">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $guru->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <div class="max-w-xs truncate">{{ $guru->alamat ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <div class="flex flex-wrap gap-1">
                                @forelse ($guru->mataPelajarans as $mataPelajaran)
                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2.5 py-0.5 rounded-full">
                                        {{ $mataPelajaran->nama_matpel }}
                                    </span>
                                @empty
                                    <span class="text-gray-500 italic">Tidak ada mata pelajaran</span>
                                @endforelse
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('guru.show', $guru->id) }}" class="text-blue-600 hover:text-blue-800 p-1 hover:bg-blue-50 rounded transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('guru.edit', $guru->id) }}" class="text-yellow-600 hover:text-yellow-800 p-1 hover:bg-yellow-50 rounded transition">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 p-1 hover:bg-red-50 rounded transition">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center">
                            <div class="text-gray-500">
                                <svg class="mx-auto h-12 w-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                                <p>Tidak ada data guru. <a href="{{ route('guru.create') }}" class="text-blue-600 hover:text-blue-800 font-medium">Tambahkan data baru</a></p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($gurus->hasPages())
        <div class="bg-gray-50 px-4 py-3 sm:px-6 border-t border-gray-200">
            {{ $gurus->links() }}
        </div>
    @endif
</div>
@endsection
