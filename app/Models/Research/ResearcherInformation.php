<?php

namespace App\Models\Research;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearcherInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'name',
        'certificate',
        'scientificTitle',
        'departments_id',
    ];
}