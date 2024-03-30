<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Research\ResearcherInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\User;
use App\Http\Controllers\config\appController;


class AdditionalInfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->appInfo = new appController();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Certification= $this->appInfo->Certification();
        $scientificTitle= $this->appInfo->scientificTitle();
        $RInfo  = ResearcherInformation::find(Auth::user()->researcher_information_id);

        return view('setting.additional_info.index', compact('RInfo','Certification', 'scientificTitle'));
    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    { 
        $RInfo  = ResearcherInformation::find(Auth::user()->researcher_information_id);

        $RInfo->name = $request->name;
        $RInfo->name_ar = $request->name_ar; 

        $RInfo->certificate = $request->certificate;
        $RInfo->scientificTitle = $request->scientificTitle;

        $RInfo->save();

        // $User = User::find(Auth::user()->id);
        // $User->name = $request->name;
        // $User->save();

        return redirect()->route('myresearch');
    }
  
}
