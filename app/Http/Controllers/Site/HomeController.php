<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller {
    
    public function getIndex(){
        return view("app/Site/Home", [
            
        ]);
    }
    
}
