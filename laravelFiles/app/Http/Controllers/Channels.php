<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class Channels extends Controller
{
    
    function create(Request $request) {

        if($request->name==""){
            return [
                "result" => "failure",
                "message" => "Please enter channel name, youtube id and select a manager"
            ];
        }else{
            $channelObj = [
                "name" => $request->name,
                "yt_id" => $request->yt_id,
                "manager" => $request->manager
            ];
            if(Channel::insert($channelObj)){
                return [
                    "result" => "success",
                    "message" => $channelObj
                ];
            }else{
                return [
                    "result" => "failure",
                    "message" => "Channel create failed"
                ];
            }
        }


    }

}
