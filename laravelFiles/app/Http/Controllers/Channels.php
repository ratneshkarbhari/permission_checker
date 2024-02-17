<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Manager;
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

    function update(Request $request) {
        
        $channelData = Channel::find($request->channel_id);

        if ($channelData) {
            if ($channelData->update([
                "name" => $request->name,
                "yt_id" => $request->yt_id,
                "manager" => $request->manager
            ])) {
                return [
                    "result" => "success",
                    "message" => $channelData  
                ];
            } else {
                return [
                    "result" => "failure",
                    "message" => "Channel update failed"  
                ];
            }
            
        } else {
            return [
                "result" => "failure",
                "message" => "Invalid channel"  
            ];
        }
        

    }

}
