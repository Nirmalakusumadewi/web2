<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('posts.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'nim' => [
                'required',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]+$/',
                'unique:mahasiswas,nim'
            ],
            'program_studi' => 'required|max:255',
            'angkatan' => 'required|digits:4|integer|min:2000|max:' . date('Y'),
        ], [
            'nama_lengkap.required' => 'Nama lengkap harus diisi.',
            'nim.required' => 'NIM harus diisi.',
            'nim.regex' => 'NIM harus mengandung huruf dan angka.',
            'nim.unique' => 'NIM sudah terdaftar.',
            'program_studi.required' => 'Program studi harus diisi.',
            'angkatan.required' => 'Angkatan harus diisi.',
            'angkatan.digits' => 'Angkatan harus terdiri dari 4 digit.',
            'angkatan.integer' => 'Angkatan harus berupa angka.',
            'angkatan.min' => 'Angkatan minimal tahun 2000.',
            'angkatan.max' => 'Angkatan tidak boleh lebih dari tahun ' . date('Y') . '.',
        ]);

        try {
            Mahasiswa::create($validatedData);
            return redirect()->route('posts.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Gagal menambahkan data mahasiswa: ' . $e->getMessage())->withInput();
        }
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('posts.show', compact('mahasiswa'));
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('posts.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'nim' => [
                'required',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]+$/',
                'unique:mahasiswas,nim,' . $id
            ],
            'program_studi' => 'required|max:255',
            'angkatan' => 'required|digits:4|integer|min:2000|max:' . date('Y'),
        ], [
            'nama_lengkap.required' => 'Nama lengkap harus diisi.',
            'nim.required' => 'NIM harus diisi.',
            'nim.regex' => 'NIM harus mengandung huruf dan angka.',
            'nim.unique' => 'NIM sudah terdaftar.',
            'program_studi.required' => 'Program studi harus diisi.',
            'angkatan.required' => 'Angkatan harus diisi.',
            'angkatan.digits' => 'Angkatan harus terdiri dari 4 digit.',
            'angkatan.integer' => 'Angkatan harus berupa angka.',
            'angkatan.min' => 'Angkatan minimal tahun 2000.',
            'angkatan.max' => 'Angkatan tidak boleh lebih dari tahun ' . date('Y') . '.',
        ]);

        try {
            $mahasiswa = Mahasiswa::findOrFail($id);
            $mahasiswa->update($validatedData);
            return redirect()->route('posts.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Gagal memperbarui data mahasiswa: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $mahasiswa = Mahasiswa::findOrFail($id);
            $mahasiswa->delete();
            return redirect()->route('posts.index')->with('success', 'Data mahasiswa berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('posts.index')->withErrors('Gagal menghapus data mahasiswa: ' . $e->getMessage());
        }
    }
}
