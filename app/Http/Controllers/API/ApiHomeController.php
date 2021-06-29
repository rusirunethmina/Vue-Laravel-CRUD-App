<?php

namespace App\Http\Controllers\API;

use App\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiHomeController extends Controller
{
    public function add_user(Request $request)
    {
          //return $request;

          $validate_data=$request->validate([

            'user_name' => ['required'],
            'email' => ['required','email'],
            'address' => ['required'],
            'mobile' => ['required','max:10'],

           ]);

         //  return $validate_data;
         $data = Home::create([

            'username' => $validate_data['user_name'],
            'mail' => $validate_data['email'],
            'address' => $validate_data['address'],
            'mobile' => $validate_data['mobile'],

        ]);

        //return $data;
        if(is_null($data)) return response()->json(['msg' => 'failed to create'], 400);

        return response()->json(['msg' => 'successfully added record'], 200);

    }
}
