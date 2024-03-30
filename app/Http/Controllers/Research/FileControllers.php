<?php

namespace App\Http\Controllers\Research;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Models\Research\File;
use App\Models\Research\Research;
use App\Models\Research\ResearcherInformation;
use App\Models\Research\ScientificResearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use App\Models\setting\YearResearch;
use Illuminate\Support\Facades\Auth;

class FileControllers extends Controller
{   public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $YearResearch = YearResearch::all();
        $Files = File::all();
        $Departments = Department::all();
        return view('Research.file.index', compact('Files', 'Departments','YearResearch'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


        // try {
        $request->validate([
            'departments_id' => 'required|integer',
            'YearResearch' => 'required|string',
            'file' => 'required|file|mimes:csv,txt|max:2024', // Adjust the validation rules as needed

        ]);
        // Handle the file upload
        if ($request->hasFile('file')) {
            $fileCsv = $request->file('file');

            // Store the file in a publicly accessible directory
           $path = $fileCsv->store('uploads', 'public');

           $File = File::where('departments_id',$request->departments_id)
           ->where('year_research_id',$request->YearResearch)
           ->first();
            if($File )
            return redirect()->back()->with(['title' => 'Upload File', 'error' => 'The file has already been uploaded']);

           $file =  File::create([
            'users_id' => Auth::user()->id,
                'departments_id' => $request->departments_id,
                'year_research_id' => $request->YearResearch,
                'file' => $path,
            ]);

             $this->uploadCsv($request,$file->id);
        }
        return redirect()->back()->with(['title' => 'Upload File', 'success' => 'File uploaded successfully']);
        // } catch (\Throwable $th) {return redirect()->back()->with(['title' => 'An error occurred while adding']);
        // }return redirect()->back()->with(['title' => 'Upload File', 'error' => 'An unexpected error occurred during the adding process']);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        try {
            $request->validate([
                'departments_id' => 'required|integer',
                'year_research_id' => 'required|string',
            ]);

            $File = File::find($request->id);
            if ($File) {
                $File->departments_id = $request->departments_id;
                $File->year_research_id = $request->YearResearch;
                $File->save();
            }
            return redirect()->back()->with('success', 'Updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred while update');
        }
        return redirect()->back()->with('error', 'An unexpected error occurred during the update process');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $file = File::find($request->id);
            if ($file) {
                 // Delete the file from storage
                Storage::delete($file->file);

                // Retrieve related Research IDs
                $researchIds = Research::where('files_id', $request->id)->pluck('id');

                // Delete related ScientificResearch records
                Research::where('files_id', $request->id)->delete();
                ScientificResearch::whereIn('research_id', $researchIds)->delete();


                $file->delete();
                return response()->json(['status' => 'success', 'message' => 'File deleted successfully']);
            }
        } catch (\Throwable $th) {

            return response()->json(['status' => 'error', 'message' => 'An error occurred while delete']);
        }
        return response()->json(['status' => 'error', 'message' => 'An unexpected error occurred during the delete process']);

    }

    public function uploadCsv( $request,$files_id)
    {

        // Read the uploaded CSV file
        $uploadedCsv = fopen($request->file('file')->getRealPath(), 'r');
        $uploadedHeaders = fgetcsv($uploadedCsv);

        // Define your template headers
        $templateHeaders = [
            'اسم التدريسي',
            'الايميل',
            'عنوان البحث',
            'الباحثين المشاركين',
        ];
        $length = count($templateHeaders);
        $lengthHcsv = count($uploadedHeaders);

        if ($length != $lengthHcsv)
            return redirect()->back()->with(['title' => 'Upload File', 'error' => 'The uploaded CSV file does not match the template.\n The number of columns is different']);


        foreach ($uploadedHeaders as $key => $value) {
            // Convert both values to strings and trim them
            $uploadedValue = trim((string) $value);
            $templateValue = trim((string) $templateHeaders[$key]);

            // Remove BOM character if present
            $uploadedValue = preg_replace('/^\xEF\xBB\xBF/', '', $uploadedValue);
            $uploadedValue = bin2hex($uploadedValue);
            $templateValue = bin2hex($templateValue);

            if ($uploadedValue != $templateValue)
                return redirect()->back()->with(['title' => 'Upload File', 'error' => 'The uploaded CSV file does not match the template.']);

        }
        $idDepart = $request->departments_id;
        // Read the rest of the rows
        while (($row = fgetcsv($uploadedCsv)) !== false) {
            $RInfo = $this->findEmail($row[1]); 
           
            if(!$RInfo)           
                $RInfo = $this->createResearcherInformation($idDepart,$row[0],$row[1]);
                

            $Research = $this->findResearch($row[2]);
            if(!$Research )
                $Research = $this->createResearch($files_id,$row);
            if($RInfo)
            {
                $SciRech = $this->findScientificResearch($RInfo->id, $Research->id);
                if(!$SciRech )
                    $this->createScientificResearch($RInfo->id, $Research->id);
            }
        }


        fclose($uploadedCsv); // Close the file
        return true ;

    }

    public function findEmail($email)
    {
        return $RInfo = ResearcherInformation::where('email', $email)->first();
    }
    public function findResearch($tilte)
    {
        return  $Research = Research::where('title', $tilte)->first();
    }

    public function findScientificResearch($researcher_information_id,$research_id)
    {
        return  $Research = ScientificResearch::where('researcher_information_id', $researcher_information_id)
        ->where('research_id', $research_id)
        ->first();
    }



    function createResearcherInformation($departments_id,$name,$email)  {

     return   ResearcherInformation::create([
                'departments_id' => $departments_id,
                'name' => $name,
                'email' => $email,
            ]);
    }


    function createResearch($files_id,$row)  {

        return   Research::create([
                   'files_id' => $files_id,
                   'title' => $row[2],
                   'otherResearchers' => empty($row[3])?null:$row[3],
               ]);
       }

    function createScientificResearch($researcher_information_id,$research_id)  {

            ScientificResearch::create([
                   'researcher_information_id' => $researcher_information_id,
                   'research_id' => $research_id,
               ]);
       }


    public function findResearchxxx($research)
    {
        ScientificResearch::all();
        $RInfo = ResearcherInformation::where('email', $email)->first();
        Research::all();

    }
    public function uploadCsvToTable($id)
    {

        $Dfstudents = Dfstudent::find($id);
        $filePath = storage_path('app/' . $Dfstudents->filename);

        $csv = Reader::createFromPath($filePath, 'r');
        // $csv->setHeaderOffset(0);
        $csvData = $csv->getRecords();

        // $columnHeaders = array(
        //     'sequencing', 'firstName', 'secondName', 'thirdName', 'fourthName', 'motherName',
        //     'gender', 'graduationRate', 'graduationRole', 'nationality',
        //     'birth', 'university', 'college', 'depart', 'certificate', 'graduationYear',
        //     'studyType', 'sectorClass', 'country', 'status', 'statusFile', 'notes', 'idFile'
        // );

        $columnHeaders = array(
            'sequencing', 'firstName', 'secondName', 'thirdName', 'fourthName', 'motherName',
            'gender', 'graduationRate', 'graduationRole', 'nationality',
            'birth', 'certificate', 'status', 'statusFile', 'notes', 'idFile', 'idUserChecker', 'idUserFile',
        );

        $collection = collect([5, 12, 13, 14, 16, 17, 18, 19]);
        foreach ($csvData as $index => $row) {
            $i = 0;
            $rowA = [];

            $rowA[$columnHeaders[$i]] = '0';
            if ($index >= 2 && !empty(array_filter($row))) {
                foreach ($row as $index2 => $value) {

                    $uploadedValue = trim(preg_replace('/^\xEF\xBB\xBF/', '', $value));
                    if (!$collection->contains($index2) && $index2 < 21) { //!empty($uploadedValue)
                        $rowA[$columnHeaders[$i]] = $uploadedValue;
                        $i++;
                    }
                }
                if (!empty($rowA[$columnHeaders[0]]) && $rowA[$columnHeaders[0]] != '0') {
                    $rowA[$columnHeaders[$i++]] = "0";
                    $rowA[$columnHeaders[$i++]] = "0";
                    $rowA[$columnHeaders[$i++]] = "";
                    $rowA[$columnHeaders[$i++]] = $id;
                    $rowA[$columnHeaders[$i++]] = "0";
                    $rowA[$columnHeaders[$i++]] = "0";
                    try {
                        $dataToSave = array_combine($columnHeaders, $rowA);
                        Student::create($dataToSave);
                    } finally {
                    }
                }
            }
        }

        // return redirect()->route('upStudents')->with('msg', 'error');
        // return view('emUploader.viewCsv', ['id' => $Dfstudents->id, 'status' => $Dfstudents->status, 'csvData' => $csvData, 'csvHeader' => $csv->getHeader()]);
    }



    public function showCsv(Request $request)
    {
        $file = File::find($request->id);
        if ($file) {
            $filePath = Storage::path('public/' . $file->file);

            $csv = Reader::createFromPath($filePath, 'r');
            $csv->setHeaderOffset(0); // Uncomment this line if your CSV file has headers

            $csvData = $csv->getRecords();
            $csvHeader = $csv->getHeader(); // Get CSV header

            return view('Research.file.csv', compact('file', 'csvData', 'csvHeader'));
        }

        // return redirect()->back()->with('error', 'File not found');
    }
}