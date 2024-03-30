<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Models\Research\File;
use App\Models\Research\Research;
use App\Models\Research\ScientificResearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\setting\YearResearch;
use App\Http\Controllers\config\appController;


class AuthorResearchControllers extends Controller
{   public function __construct()
    {
        $this->middleware('auth');
        $this->appInfo = new appController(); 
    }
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {

           $Certification= $this->appInfo->Certification_short_ar();
           $scientificTitle= $this->appInfo->scientificTitle_short_ar();

        $YearResearch = YearResearch::all();
        $file = [];
            $researchIds = ScientificResearch::where('researcher_information_id', Auth::user()->researcher_information_id)
            ->pluck('research_id');
        $file = Research::whereIN('id', $researchIds)
            ->get();

        $Departments = Department::all();
        return view('Research.AuthorResearch.index', compact('file', 'Departments','YearResearch','Certification','scientificTitle'));
    }

    /**
     * Display the specified resource.
     */
    public function fResearch(Request $request)
    {
        $YearResearch = YearResearch::all();

        $fileInfo = File::where('departments_id', $request->departments_id)
            ->where('year_research_id', $request->year_research_id)
            ->first();

        $researchIds = ScientificResearch::where('researcher_information_id', Auth::user()->researcherInformation_id)
            ->pluck('research_id');

        $file = [];
        if ($fileInfo) {

            $file = Research::whereIN('id', $researchIds)
                ->where('files_id', $fileInfo->id)
                ->get();
        }

        $Departments = Department::all();
        return view('Research.AuthorResearch.index', compact('fileInfo', 'file', 'Departments','YearResearch'));
    }

}