<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Vote;
use Auth;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $kandidats = Candidate::all();
            return redirect()->route('index',compact('kandidats'))->with('errors','lu admin ngapain ngevote?');
        } else{
            if (Auth::user()->has_voted == 1) {
                return redirect()->route('index')->with('errors', 'Lu udah ngevote ngapain ngevote lagi?');
            }else{
                $kandidats = Candidate::all();
                return view('voting.index', compact('kandidats'));
            }
        }
    }

    public function visimisi($id){
        $visimisi = Candidate::findOrFail($id);
        return view('voting.visimisi', compact('visimisi'));
    }
    public function vote(Request $request)
    {
        $kandidat_id = Candidate::findOrFail($request->kandidat_id);
        $kandidat_id->increment('vote_count');
        Auth::user()->update(['has_voted'=>true]);
        
        return redirect()->route('index')->with('success', 'Voting berhasil');
    }
}
