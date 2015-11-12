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
    
    public function postSubmit(Request $request){
        if ($request->isMethod('post')) {
            $raw = $request->input('data');
            $list = json_decode($raw);
            if(is_array($list)){
                foreach($list as $quest){
                    if(isset($quest->api_no)){
                        Storage::put('quests/'.$quest->api_no.'.json', json_encode($quest));
                    }
                }
                return response()->json(['success'=>true])
                    ->header('Access-Control-Allow-Origin', '*');
            }
        }
        return response()->json(['success' => false])
            ->header('Access-Control-Allow-Origin', '*');
    }
    
}
