<?php

namespace App\Http\Controllers;

use App\Models\ChannelPermission;
use App\Models\Title;
use Illuminate\Http\Request;

class Titles extends Controller
{
    
    function update(Request $request) {


        $titleId = $request->title_id;
        
        $titleObj =  [
            "name" => $request->name,
            "cast" => $request->cast,
            "yor" => $request->yor,
            "language" => $request->language,
            "lot" => $request->lot,
            "grading" => $request->grading,
            "full_movie" => $request->fullMovie,
            "scene" => $request->scene,
            "song" => $request->song
        ];

        if (Title::find($titleId)->update($titleObj)) {

            ChannelPermission::where("title_id",$titleId)->delete();

            $permissionsToAdd = [];

            foreach($request->channels as $channel){


                $titleChannelPermissionEntity = [
                    "channel_id" => $channel,
                    "title_id" => $titleId,
                ];

                $permissionsToAdd[] = $titleChannelPermissionEntity;

            }

            ChannelPermission::insert($permissionsToAdd);

            return [
                "result" => "success",
                "message" => "Title updated"
            ];

        } else {
            return [
                "result" => "failure",
                "message" => "Title update failed"
            ];
        }
        

    }

}
