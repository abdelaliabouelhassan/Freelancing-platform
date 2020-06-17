<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('getLong');
    }

   public  function  ChangePassword(Request $request){


       $this->validate($request,[
           'Password'=>'required|min:6',
       ]);

       $user = auth('api')->user();

    if(Hash::check($request->oldPassword,$user->password)){
        $user->update([
            'password'=>Hash::make($request->Password),
        ]);
        if($user){
            return response()->json([
                'message' => trans('messages.passwordchange')], 200);
        }else{
            return response()->json([
                'message' => 'error something  wrong'], 406);

        }

    }else{
        return response()->json([
            'message' => trans('messages.oldpassword')], 406);
    }





   }
}
