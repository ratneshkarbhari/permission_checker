<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\ChannelPermission;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageLoader extends Controller
{
    function index(){
        return view("index");
    }

    function see_titles($channelId){


        $query = 'select DISTINCT t.name,t.full_movie,t.scene,t.song from titles t, channel_permissions cp, channels c where t.id = cp.title_id and cp.channel_id = '.$channelId;
       
        $titles = DB::select($query);
      
        $titles = json_decode(json_encode($titles),TRUE);
        
        return view("channel_permitted_titles",[
            "titles" => $titles
        ]);
        
    }

}
