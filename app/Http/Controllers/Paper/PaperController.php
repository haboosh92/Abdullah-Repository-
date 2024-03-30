<?php

namespace App\Http\Controllers\Paper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\PaperMetadataService;
use App\Models\research\researchInfo;
use App\Models\Research\Research;
use App\Http\Controllers\Paper\DateTime;
use App\Models\Research\ScientificResearch;
use Illuminate\Support\Facades\Auth;

class PaperController extends Controller
{
    protected $paperMetadataService;




    public function __construct(PaperMetadataService $paperMetadataService)
    {
        $this->middleware('auth');
        $this->paperMetadataService = $paperMetadataService;
    }


    
    public function index(Request $request)
    {
        
        $is_auther = false;
        $doi ='';
           $research =Research::find($request->id);
        if (!$research) 
        return redirect()->back()->with('error', 'Research is not available'); 
          
        
        $ScientificResearch = ScientificResearch::where('research_id',$request->id)
        ->where('researcher_information_id', Auth::user()->researcher_information_id)
        ->first();
        if($ScientificResearch)        
            $is_auther = true;

        $metadata = researchInfo::where('research_id',$request->id)->first();
        if ($metadata) {
            $doi=$metadata->doi;
        } 
        return view('Research.paper.index', compact('metadata','doi','research','is_auther'));
         // Create a new Paper model instance
         $paper = new Paper();

    }

    public function create(Request $request)
    { 
        try { 
               $doi = $request->doi;
        if(empty(trim($doi)))
        {
              $paper = researchInfo::where('research_id',$request->id)->first();
        if($paper) 
        { 
            $paper->delete();
            return redirect()->back()->with('success', 'Paper Metadata  has been deleted'); 
        }
        return redirect()->back()->with('errorx', 'x');
        }
        // $doi ="10.11591/ijece.v13i2.pp1903-1913";
        $research =Research::find($request->id);
        if (!$research) 
        return redirect()->back()->with('error', 'Research is not available'); 
            
           $metadata =$this->paperMetadataService->getPaperMetadata($doi);
          
        // Create a new Paper model instance
        $paper = researchInfo::where('research_id',$request->id)->first();
        
        if(!$paper) 
             {
                $paper = new researchInfo();
                $paper->research_id = $request->id; 
                $paper->save(); 
                $paper = researchInfo::find($paper->id);
            } 

        // Assuming $metadata['publication_date'] contains [2023, 4, 1]
        $fPDate = "";
        if($metadata['publication_date']!=null)
            foreach ($metadata['publication_date'] as $value)
                $fPDate .=$value."-";
                  $fPDate = rtrim($fPDate, '-');

        // Create a new DateTime object using the values from the array
        // $publicationDate = new \DateTime();
        
        // $publicationDate->setDate($publicationDateArray[0], $publicationDateArray[1], $publicationDateArray[2]); 
        // Format the date according to your requirements
    //    return $formattedPublicationDate = $publicationDate->format('Y-m-d'); // Example format: YYYY-MM-DD
 
        // Assign metadata values to the model instance 
        $paper->doi = $doi;
        $paper->title = $metadata['title'];
        $paper->url = $metadata['url'];
        $paper->authors =  ($metadata['authors']); // Assuming authors is a JSON field
        $paper->publication_date = $fPDate;
        $paper->journal_name = $metadata['journal_name'];
        $paper->abstract = $metadata['abstract'];
        $paper->type = $metadata['type'];
        $paper->volume = $metadata['volume'];
        $paper->issue = $metadata['issue']; // Convert issue array to string
        $paper->pdf_link = $metadata['pdf_link'];
        $paper->ISSN = $metadata['ISSN'];

         // Save the model instance to the database
         $paper->save(); 
        
         $metadata = researchInfo::where('research_id',$request->id)->first();
        if ($metadata) {
            $doi=$metadata->doi;
        } 
     
} catch (\Throwable $th) {
    return $th->getMessage();
}

// return $metadata;

        return redirect()->route('metadata',['id',$request->id]);
        // return view('Research.paper.index', compact('metadata','doi','research'));

    }

    public function show(Request $request)
    {
        $doi ='';
        $research =Research::find($request->id);
        $metadata = researchInfo::where('research_id',$request->id)->first();
        if ($metadata) {
            $doi=$metadata->doi;
        }
        return view('Research.paper.index', compact('metadata','doi','research'));
         // Create a new Paper model instance
         $paper = new Paper();

    }

    public function getPaperMetadata(Request $request)
    {   $doi= $request->doi;
        $metadata = json($this->paperMetadataService->getPaperMetadata("10.11591/".$doi));

        return view('Research.paper.index', compact('metadata','doi'));
        // Handle metadata, e.g., return as JSON response
        return response()->json($metadata);
    }


    public function save(Request $request)
    {
         // Create a new Paper model instance
         $paper = new researchInfo();

         // Assign metadata values to the model instance
         $paper->title = $metadata['title'];
         $paper->url = $metadata['url'];
         $paper->authors = $metadata['authors'];
         $paper->publication_date = $metadata['publication_date'];
         $paper->journal_name = $metadata['journal_name'];
         $paper->abstract = $metadata['abstract'];
         $paper->type = $metadata['type'];
         $paper->volume = $metadata['volume'];
         $paper->issue = $metadata['issue'];
         $paper->pdf_link = $metadata['pdf_link'];
         $paper->ISSN = $metadata['ISSN'];

         // Save the model instance to the database
         $paper->save();
    }

 
    public function downloadPdf()
    {
        $url="https://ijece.iaescore.com/index.php/IJECE/article/viewFile/29106/16392";
        $pdfContents = file_get_contents($url);

        if (!$pdfContents) {
            return response()->json(['error' => 'PDF download failed'], 500);
        }

        return response()->streamDownload(function () use ($pdfContents) {
            echo $pdfContents;
        }, 'downloaded.pdf', ['Content-Type' => 'application/pdf']);
    }

}