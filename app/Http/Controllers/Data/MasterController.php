<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;

class MasterController extends Controller {
    
    public function getIndex(){
        return view("app/Data/Master", [
            'master' => Storage::get('master/latest.json'),
            'lmdate' => Storage::lastModified('master/latest.json'),
        ]);
    }
    
    public function postSubmit(){
        
    }
    
}
