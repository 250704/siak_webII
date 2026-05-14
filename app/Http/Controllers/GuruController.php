<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::with('mataPelajarans')->paginate(10);
        return view('guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mataPelajarans = MataPelajaran::all();
        return view('guru.create', compact('mataPelajarans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_guru' => 'required|string|max:255',
            'email' => 'required|email|unique:gurus',
            'alamat' => 'nullable|string',
            'mata_pelajarans' => 'nullable|array',
            'mata_pelajarans.*' => 'exists:mata_pelajarans,id',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('guru-photos', 'public');
        }

        $guru = Guru::create($validated);

        if ($request->has('mata_pelajarans')) {
            $guru->mataPelajarans()->sync($request->input('mata_pelajarans'));
        }

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        return view('guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        $mataPelajarans = MataPelajaran::all();
        $selectedMataPelajarans = $guru->mataPelajarans->pluck('id')->toArray();
        return view('guru.edit', compact('guru', 'mataPelajarans', 'selectedMataPelajarans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama_guru' => 'required|string|max:255',
            'email' => 'required|email|unique:gurus,email,' . $guru->id,
            'alamat' => 'nullable|string',
            'mata_pelajarans' => 'nullable|array',
            'mata_pelajarans.*' => 'exists:mata_pelajarans,id',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            $validated['foto'] = $request->file('foto')->store('guru-photos', 'public');
        }

        $guru->update($validated);

        if ($request->has('mata_pelajarans')) {
            $guru->mataPelajarans()->sync($request->input('mata_pelajarans'));
        }

        return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}
