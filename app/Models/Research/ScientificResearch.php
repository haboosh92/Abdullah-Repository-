<?php

namespace App\Models\Research;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientificResearch extends Model
{
    use HasFactory;
    protected $fillable = [
        'researcher_information_id',
        'research_id',
    ];

    public function researcherInformation()
    {
        return $this->belongsTo(ResearcherInformation::class, 'researcher_information_id');
    }
}
