<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $kandidats = Candidate::all();
        $siswas = User::where('role','siswa')->get();
        return response()->json([
            'status'=>200,
            'message'=>'Berhasil mendapatkan data',
            'data'=>[
                'kandidat'=>$kandidats,
                'siswa'=>$siswas
            ]
        ],200);
    }
}
