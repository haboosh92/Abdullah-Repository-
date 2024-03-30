<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Department\Department;
use App\Models\Research\File;
use App\Models\Research\Research;
use App\Models\Research\ResearcherInformation;
use App\Models\Research\ScientificResearch;
use App\Models\User;

class statisticsHomeController extends Controller {
    public function __construct() {
        $this->middleware( 'auth' );
    }

    public function index() {

        $Administrator = User::where( 'role', 'Administrator' )
        ->where( 'is_primary', null )
        ->count();

        $Editor = User::where( 'role', 'Editor' )->count();

        $Professors = User::where( 'role', 'Professor' )->count();

        $Departments = Department::all();

        $Researchs = null;
        $countDepartAll = [];
        $countAll = 0;
        foreach ( $Departments as $key => $depart ) {
            $File = File::where( 'departments_id', $depart->id )
            // ->orderBy( 'year_research_id ', 'desc' )
            ->get();
            $countDepartAll[$depart->id] =0;
            foreach ( $File as $key => $value ) {

                $Researchs[ $depart->id ][ $value->YearResearch->name ] = Research::where( 'files_id', $value->id )
                ->count();
                $countDepartAll[$depart->id] += $Researchs[ $depart->id ][ $value->YearResearch->name ];

            }
            $countAll +=$countDepartAll[$depart->id];
        } 
        return view( 'home.index', compact( 'Departments', 'Researchs','countAll', 'Administrator', 'Editor', 'Professors' ,'countDepartAll') );
    }

}