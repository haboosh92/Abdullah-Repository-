<?php

namespace App\Models\Research;

use App\Models\Department\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\setting\YearResearch;
class File extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'departments_id',
        'year_research_id',
        'file',
    ];

    // Define a belongsTo relationship with the Department model
    public function department()
    {
        return $this->belongsTo(Department::class, 'departments_id');
    }

    public function research()
    {
        return $this->hasMany(Research::class, 'files_id');
    }

    public function YearResearch()
    {
        return $this->belongsTo(YearResearch::class, 'year_research_id');
    }
}