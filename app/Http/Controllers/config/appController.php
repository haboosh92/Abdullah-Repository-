<?php

namespace App\Http\Controllers\config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class appController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function Certification(){
        return ["Doctorate","Master's"];
    }
    public function scientificTitle(){
        return ["Professor","Assistant Professor","Lecturer","Assistant Lecturer"]; 
    }

    public function Certification_short(){
        return ["Dr.","."];
    }
    public function scientificTitle_short(){
        return ["Professor.","Assistant Professor.","Lecturer.","Assistant Lecturer."]; 
    }

    
    public function Certification_short_ar(){
        return [".د","."];
       
    }
    public function scientificTitle_short_ar(){
        return ["أ","أ.م","م","م.م"]; 
          
    }
}
