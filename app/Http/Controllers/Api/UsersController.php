<?php

namespace App\Http\Controllers\Api;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use \App\Models\User;
use Validator;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $Validation = Validator::make($request->all(), [
                'server' => 'required|integer|max:99',
                'game_id' => 'required|integer',
                'game_name' => 'required|max:100',
                'username' => 'required|max:100',
                'email' => 'required|email|max:255',
                'password' => 'required|min:5|max:20',
            ]);
            
            if ($Validation->fails()){
                throw new \Exception($Validation->errors()->all()[0]);
            }
            
            $User = new User();
            $User->server = $request->input('server');
            $User->game_id = $request->input('game_id');
            $User->game_name = $request->input('game_name');
            $User->username = $request->input('username');
            $User->email = $request->input('email');
            $User->password = Hash::make( $request->input('password') );
            $User->save();
            
            DB::commit();
            return response()->json([
                'success' => true,
                'data' => [
                    'server' => intval( $User->server ),
                    'game_name' => $User->game_name,
                    'username' => $User->username,
                    'avatar' => $User->avatar,
                ],
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => (\App::environment('local'))?$e->getMessage():"",
            ]);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request, $username)
    {
        try {
            $User = User::where('username', $username)->firstOrFail();
            
            return response()->json([
                'success' => true,
                'data' => [
                    'server' => intval( $User->server ),
                    'game_name' => $User->game_name,
                    'username' => $User->username,
                    'avatar' => $User->avatar,
                ],
            ]);
        }catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        DB::beginTransaction();
        try {
            $Validation = Validator::make($request->all(), [
                'email' => 'email|max:255',
                'password' => 'min:5|max:20',
                'avatar' => 'url',
            ]);
            
            if ($Validation->fails()){
                throw new \Exception($Validation->errors()->all()[0]);
            }
            
            $User = User::where('username', $username)->firstOrFail();
            $User->email = $request->input('email');
            $User->password = Hash::make( $request->input('password') );
            $User->avatar = $request->input('avatar');
            $User->save();
            
            DB::commit();
            return response()->json([
                'call' => $request->all(),
                'success' => true,
                'data' => [
                    'server' => intval( $User->server ),
                    'game_name' => $User->game_name,
                    'username' => $User->username,
                    'avatar' => $User->avatar,
                ],
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => (\App::environment('local'))?$e->getMessage():"",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function deactivate($username)
    {
        DB::beginTransaction();
        try {
            $User = User::where('username', $username)->firstOrFail();
            $User->delete();
            
            DB::commit();
            return response()->json([
                'success' => true,
            ]);
        }catch(\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
