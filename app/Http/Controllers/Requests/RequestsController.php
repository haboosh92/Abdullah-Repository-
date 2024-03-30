<?php

namespace App\Http\Controllers\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Research\Research;
use App\Models\Research\ScientificResearch;
use App\Models\research\Requests;
use App\Models\research\researchInfo; 
 

class RequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        if (Auth::user()->role=='Professor') {
            
         $requests = Requests::orderBy('id', 'desc')
         ->orderBy('status', 'desc')
         ->where('user_id',Auth::user()->id)
         ->get();  
        }
        else 
         $requests = Requests::orderBy('id', 'desc')
        ->orderBy('status', 'desc')->get();  
        
        // return $requests[0]->Research;
        // return $requests[0]->User;
        return view('Research.requests.index', compact('requests'));
    }

 /**
     * Display a listing of the resource. 
     */
    public function show(Request $request)
    { 
        
        $requests = Requests::find($request->id);
        $is_auther = false;
        $doi ='';
        $research =Research::find($requests->Research->id);
        if (!$research) 
        return redirect()->back()->with('error', 'Research is not available'); 
          
        
        $ScientificResearch = ScientificResearch::where('research_id',$research->id)
        ->where('researcher_information_id',$requests->User->researcherInformation_id)
        ->first();
        if($ScientificResearch)        
            $is_auther = true;

        $metadata = researchInfo::where('research_id',$research->id)->first();
        if ($metadata) {
            $doi=$metadata->doi;
        }
        return view('Research.requests.metadata', compact('metadata','doi','research','is_auther','requests'));
         
    }

     /**
     * Display a listing of the resource.
     */
    public function request(Request $request)
    {
        
        try{       
            $Research = Research::find($request->id);
            if(!$Research)
            return response()->json(['status' => 'error', 'message' =>'An error occurred while Send a request to the system administrator']); 

            
        //    $SciResearch =  ScientificResearch::where('researcher_information_id',Auth::user()->researcherInformation_id)
        //    ->where('research_id',$request->id)
        //    ->first();
        //     if(!$SciResearch) 

            $Requests = Requests::where('user_id',Auth::user()->id)
            ->where('research_id',$request->id)
            ->first();
            if($Requests)
            return response()->json(['status' => 'success', 'message' =>'Send a request to the system administrator successfully']);

            Requests::create([
                    'user_id'=>Auth::user()->id,
                    'research_id'=>$request->id
            ]); 
            return response()->json(['status' => 'success', 'message' =>'Send a request to the system administrator successfully']);
        } catch (\Throwable $th) { 
            return response()->json(['status' => 'error', 'message' =>'An error occurred while Send a request to the system administrator']);
        } 
            return response()->json(['status' => 'error', 'message' =>'An error occurred while Send a request to the system administrator']);

    }
  /**
     * Display a listing of the resource.
     */
    public function acceptrequest(Request $request)
    {
        
        try{       
            $requests = Requests::find($request->id); 
            if(!$requests)
            return response()->json(['status' => 'error', 'message' =>'This request does not exist']); 
 
            $ScientificResearch = ScientificResearch::where('research_id',$requests->research_id)
            ->where('researcher_information_id', $requests->User->researcher_information_id)
            ->first();
 
            if($ScientificResearch)
            return response()->json(['status' => 'error', 'message' =>'This request has been previously accepted']);

            ScientificResearch::create([
                    'researcher_information_id'=>$requests->User->researcher_information_id,
                    'research_id'=>$requests->research_id
            ]); 
            $requests->status=1;
            $requests->save();
            return response()->json(['status' => 'success', 'message' =>'This request has been successfully accepted']);
        } catch (\Throwable $th) { 
            return response()->json(['status' => 'error', 'message' =>'An error occurred in the request accept process']);
        } 
            return response()->json(['status' => 'error', 'message' =>'An unexpected error occurred in the request accept process']);

    }
     

    public function rejectrequest(Request $request)
    {
        
        try{       
            $requests = Requests::find($request->id); 
            if(!$requests)
            return response()->json(['status' => 'error', 'message' =>'This request does not exist']); 
 
            $ScientificResearch = ScientificResearch::where('research_id',$requests->research_id)
            ->where('researcher_information_id', $requests->User->researcher_information_id)
            ->first();
 
            if($ScientificResearch) 
            $ScientificResearch->delete();
 
            $requests->status=2;
            $requests->save();
            return response()->json(['status' => 'success', 'message' =>'This request has been successfully Rejected']);
        } catch (\Throwable $th) { 
            return response()->json(['status' => 'error', 'message' =>'An error occurred in the request Rejected process']);
        } 
            return response()->json(['status' => 'error', 'message' =>'An unexpected error occurred in the request Rejected process']);

    }
}
 