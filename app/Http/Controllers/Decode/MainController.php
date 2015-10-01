<?php

namespace App\Http\Controllers\Decode;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller {
    
    public function getIndex(Request $request){
        dd([1,2,3]);
        return view("app/Decode/Main", [
            
        ]);
    }
    
}
