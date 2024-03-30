<?php

namespace App\Models\research;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class researchInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'research_id',
        'doi',
        'title',
        'url',
        'authors',
        'publication_date',
        'journal_name',
        'abstract',
        'type',
        'volume',
        'issue',
        'pdf_link',
        'ISSN',
    ];

    protected $casts = [
        'authors' => 'json',
    ];
}