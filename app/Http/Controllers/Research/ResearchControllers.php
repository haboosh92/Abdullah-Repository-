<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Models\Research\File;
use App\Models\Research\Research;
use App\Models\Research\ScientificResearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Research\ResearcherInformation;
 
use App\Models\setting\YearResearch;
use App\Http\Controllers\config\appController;

class ResearchControllers extends Controller
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
        $Research = [];
        $Departments = Department::all();
        return view('Research.data.index', compact('Research', 'Departments','YearResearch','Certification','scientificTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create  (Request $request)
    {  
        $request->validate([
            'departments_id2' => 'required|integer', 
            'year' => 'required|string', 
            'email' => 'required|string', 
            'aouthername' => 'required|string', 
            'title' => 'required|string',  
        ]);

        // use App\Models\Research\File;
        // use App\Models\Research\Research;
        // use App\Models\Research\ScientificResearch;
        // $SResearch = ScientificResearch::
       $ReInfo = ResearcherInformation::where('email', $request->email)->first();
       if(!$ReInfo){
        $ReInfo = ResearcherInformation::create([
            'name'=>$request->aouthername,
            'email'=>$request->email,
            'departments_id'=>$request->departments_id2, 
        ]);
       }

       $Research = Research::where('title', $request->title)->first();
       if(!$Research){
        $file = File::where('name',$request->year)
        ->where('departments_id',$request->departments_id2)
        ->first(); 
        if(!$file){ 
            $file = File::create([
            'name'=>$request->year, 
            'departments_id'=>$request->departments_id2,  
            ]);
        }

       $Research =  Research::create([
            'files_id'=>$file->id, 
            'title'=>$request->title, 
        ]);

        
       $SResearch =  ScientificResearch::create([
        'researcher_information_id'=>$ReInfo->id, 
        'research_id'=>$Research->id, 
        ]);
       }
        
       return redirect()->back()->with(['title' => 'Add new research', 'success' => 'Research adding successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function fResearch(Request $request)
    { 
        $Certification= $this->appInfo->Certification_short_ar();
        $scientificTitle= $this->appInfo->scientificTitle_short_ar();
        $fileInfo = File::where('departments_id', $request->departments_id)
            ->where('year_research_id', $request->year_research_id )
            ->first();
        $file = [];
        if ($fileInfo) {
            $file = File::with('research.scientificResearch.researcherInformation')->find($fileInfo->id);
        }

        $YearResearch = YearResearch::all();
        $Departments = Department::all();
        return view('Research.data.index', compact('file', 'Departments','YearResearch','Certification','scientificTitle'));
    }

    /**autherResearch
     * Update the specified resource in storage.
     */
    public function edit(Request $request)
    {
        if (in_array(Auth::user()->role, ["Editor", "Administrator"])) {

            $Research = Research::find($request->id);
            if ($Research) {
                $Research->title = $request->title;
                $Research->save();
                return response()->json(['status' => 'success', 'message' => 'Research title update successfully']);
            }

            return response()->json(['status' => 'error', 'message' => 'An error occurred while Research title update']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'You do not have permission to edit']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
 
            Research::where('id', $request->id)->delete();
            ScientificResearch::where('research_id', $request->id)->delete();

            return response()->json(['status' => 'success', 'message' => 'File deleted successfully']);

        } catch (\Throwable $th) {

            return response()->json(['status' => 'error', 'message' => 'An error occurred while delete']);
        }
        return response()->json(['status' => 'error', 'message' => 'An unexpected error occurred during the delete process']);

    }
}