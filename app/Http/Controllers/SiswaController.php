<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    { 
        $siswas = User::where('role', 'siswa')->get();
        if (request('search')) {
            $siswas = User::where('nama','like','%'.request('search').'%')->orWhere('nis','like','%'.request('search').'%')->get();
        }
        return view('admin.siswa.index', compact('siswas'));
    }
    public function create()
    {
        return view('admin.siswa.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:users,nis',
            'nama' => 'required',
            'password' => 'required|min:7',
        ]);
        
        User::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('index');
    }
    public function edit($id)
    {
        $siswa = User::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }
    public function update(Request $request, $id)
    {
        $siswa = User::findOrFail($id);
        $validated = $request->validate([
            'nis' => 'required|unique:users,nis,'.$siswa->id,
            'nama' => 'required',
            'password' => 'nullable|min:7',
        ]);

        $data = [
            'nis' => $validated['nis'],
            'nama' => $validated['nama'],
        ];

        if ($request->password) {
            $data['password'] = Hash::make($validated['password']);
        }
        
        $siswa->update($data);
        
        return redirect()->route('siswa.index')->with('success', 'Berhasil mengedit siswa');
    }
    public function destroy($id)
    {
        $siswa = User::findOrFail($id);
        $siswa->delete();
        return redirect()->back()->with('success', 'Siswa berhasil dihapus');
    }
}
