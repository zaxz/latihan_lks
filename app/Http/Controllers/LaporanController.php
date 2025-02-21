<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;

class LaporanController extends Controller
{
    public function index(){
        $kandidats = Candidate::all();
        $siswas = User::where('role','siswa')->get();
        $total_suara = User::where('role','siswa')->where('has_voted', true)->count();
        foreach ($kandidats as $kandidat) {
            if ($total_suara>0) {
                $kandidat->persentase = round(($kandidat->vote_count/$total_suara)*100,2);
                // dd($kandidat);
            } else {
                $kandidat->persentase = 0;
            }
        }
        return view('admin.laporan', compact('kandidats'));
    }
}
