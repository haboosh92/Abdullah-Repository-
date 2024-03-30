<?php

namespace App\Models\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearResearch extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'name', 
    ];
}
