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
    
    public function postSubmit(Request $request){
        if ($request->isMethod('post')) {
            $raw = $request->input('data');
            $obj = json_decode($raw);
            if(isset($obj->api_data)){
                Storage::put('master/latest.json', $raw);
                return response()->json(['success'=>true])
                    ->header('Access-Control-Allow-Origin', '*');
                    //  ->setCallback($request->input('callback'));
            }
        }
        return response()->json(['success' => false])
            ->header('Access-Control-Allow-Origin', '*');
            // ->setCallback($request->input('callback'));
    }
    
}
