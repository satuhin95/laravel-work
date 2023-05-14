<?php
 namespace App\Traits;
 use Illuminate\Http\jsonResponse;
 trait ResponseTrait{
    public function responseSuccess($data,$message='Successfull'):jsonResponse{
        return response()->json([
            'status'=>true,
            "message"=>$message,
            'data'=>$data,
            'errors'=>null
        ]);

    }
    public function responseError($errors,$message='Something went wrong'):jsonResponse{
        return response()->json([
            'status'=>false,
            "message"=>$message,
            'data'=>null,
            'errors'=>$errors
        ]);

    }
 }