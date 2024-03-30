<?php

namespace App\Models\Research;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;
    protected $fillable = [
        'files_id',
        'title',
        'type',
        'otherResearchers',
    ];

    public function files()
    {
        return $this->belongsTo(File::class, 'files_id');
    }
    public function scientificResearch()
    {
        return $this->hasMany(ScientificResearch::class, 'research_id');
    }

}