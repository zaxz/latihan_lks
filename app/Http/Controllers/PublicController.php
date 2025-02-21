<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;

class PublicController extends Controller
{
    public function index()
    {
        $kandidats = Candidate::all();
        $siswas = User::where('role', 'siswa')->get();
        $udh_vote = User::where('has_voted', 1)->where('role', 'siswa')->get();
        $blm_vote = User::where('has_voted', 0)->where('role', 'siswa')->get();

        $total_suara = $siswas->where('has_voted', true)->count();

        foreach ($kandidats as $kandidat) {
            if ($total_suara>0) {
                $kandidat->persentase = round(($kandidat->vote_count / $total_suara)*100,2);
            } else{
                $kandidat->persentase = 0;
            }
            // $kandidat->persentase = $total_suara > 0 ? round(($kandidat->vote_count/$total_suara  ) * 100, 2) : 0;
        }
        $persentaseUdh = round(($udh_vote->count()/$siswas->count())*100,2);
        $persentaseBlm = round(($blm_vote->count()/$siswas->count())*100,2);
        
        return view("welcome", compact('kandidats','siswas','udh_vote','blm_vote','persentaseUdh','persentaseBlm'));
    }
}
