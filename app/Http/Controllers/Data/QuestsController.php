<?php

namespace App\Http\Controllers\Data;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;

class QuestsController extends Controller {
    
    public function getIndex(){
        $files = Storage::files('quests');
        $quests = [];
        
        foreach($files as $file){
            $questData = json_decode(Storage::get($file));
            $quests[$questData->api_no] = $questData;
        }
        
        return view("app/Data/Quests", [
            'quests' => $quests,
        ]);
    }
    
    public function postSubmit(){
        
    }
    
}
