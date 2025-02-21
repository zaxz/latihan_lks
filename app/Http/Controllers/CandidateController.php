<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Storage;

class CandidateController extends Controller
{
    public function index()
    {
        $kandidats = Candidate::all();
        if (request('search')) {
            $kandidats = Candidate::where('nama','like','%'.request('search').'%')->orWhere('nama','like','%'.request('search').'%')->get();
        }
        return view('admin.kandidat.index', compact('kandidats'));
    }
    public function create()
    {
        return view('admin.kandidat.create');
    }
    public function store(Request $request)
    {
        $kandidat = $request->validate([
            'nama' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('kandidat','public');
            $kandidat['foto'] = $path;
        }

        Candidate::create($kandidat);
        
        return redirect()->route('kandidat.index')->with('success', 'Berhasil menambahkan kandidat baru');
    }
    public function edit($pler)
    {
        $kandidats = Candidate::findOrFail($pler);
        return view('admin.kandidat.edit', compact('kandidats'));
    }

    public function update(Request $request, $id)
    {
        $kandidat = Candidate::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($kandidat->foto) {
                Storage::disk('public')->delete($kandidat->foto);
            }
            $path = $request->file('foto')->store('kandidat', 'public');
            $validated['foto'] = $path;
        }

        $kandidat->update($validated);

        return redirect()->route('kandidat.index')->with('success', 'Kandidat berhasil diedit');
    }

    public function destroy($id)
    {
        $kandidat = Candidate::findOrFail($id);
        
        if ($kandidat->foto) {
            Storage::disk('public')->delete($kandidat->foto);
        }
        
        $kandidat->delete();

        return redirect()->back()->with('success', 'Kandidat berhasil dihapus');
        
    }
}
