<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller {
    
    public function getIndex(){
        return view("app/Data/Main", [
            
        ]);
    }
    
}
