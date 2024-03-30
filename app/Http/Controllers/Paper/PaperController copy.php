<?php

namespace App\Http\Controllers\Paper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\PaperMetadataService;
use App\Models\research\researchInfo;
use App\Models\Research\Research;
use App\Http\Controllers\Paper\DateTime;

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
        try { 
        
        $doi ='';
        $research =Research::find($request->id);
        if ($research) {
            
        $metadata =$this->paperMetadataService->getPaperMetadata("10.11591/ijece.v13i2.pp1903-1913");
          
        // Create a new Paper model instance
        $paper = researchInfo::where('research_id',$request->id)->first();
        
        if(!$paper) 
             {
                $paper = new researchInfo();
                $paper->research_id = $request->id; 
                $paper->save(); 
                $paper = researchInfo::find($paper->id);
            }
    
        $doi =$paper->doi;
           
            
        // Assuming $metadata['publication_date'] contains [2023, 4, 1]
        $publicationDateArray = $metadata['publication_date'];

        // Create a new DateTime object using the values from the array
        $publicationDate = new \DateTime();
        $publicationDate->setDate($publicationDateArray[0], $publicationDateArray[1], $publicationDateArray[2]);

        // Format the date according to your requirements
        $formattedPublicationDate = $publicationDate->format('Y-m-d'); // Example format: YYYY-MM-DD
 
        // Assign metadata values to the model instance 
        $paper->doi = $doi;
        $paper->title = $metadata['title'];
        $paper->url = $metadata['url'];
        $paper->authors =  ($metadata['authors']); // Assuming authors is a JSON field
        $paper->publication_date = $metadata['publication_date'];
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
    }
} catch (\Throwable $th) {
    return $th->getMessage();
}
        return view('Research.paper.index', compact('metadata','doi','research'));

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


    public function create(Request $request)
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


    public function edit(Request $request)
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
  

}