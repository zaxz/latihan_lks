<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'nama', 'visi', 'misi', 'foto', 'vote_count'
    ];
}
