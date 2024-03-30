<?php

namespace App\Models\research;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Research\Research;

class Requests extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'user_id',
        'research_id',
        'status'
];


    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Research()
    {
        return $this->belongsTo(Research::class, 'research_id');
    }
}