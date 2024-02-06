<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\ChannelPermission;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageLoader extends Controller
{

    private function page_loader($viewName,$data){
        echo view("templates/header",$data);
        echo view("pages/".$viewName,$data);
        echo view("templates/footer",$data);
    }

    function upload_monthly_data(){
        $this->page_loader("upload_monthly_data",["title"=>"Upload Monthly Data"]);
    }

    function user_dashboard() {

        if(!session("manager_id")){
            return redirect()->to(url("user-login"));
        }
        
        
        $channels = Channel::where("manager",session("manager_id"))->get();
        
        $this->page_loader("manager_channels",[
            "title" => "Your Channels",
            "channels" => $channels
        ]);

    }

    function user_login(){

        $this->page_loader("user_login",[
            "title" => "User Login"
        ]);

    }

    function see_titles($channelId){


        $channel = Channel::find($channelId);

        if($channel){

            if($channel["manager"]!=session("manager_id")){
                return redirect()->to(url("/"));
            }

                
            $query = 'select DISTINCT t.name,t.full_movie,t.scene,t.song,t.grading,t.lot,t.language,t.yor,t.cast from titles t, channel_permissions cp, channels c where t.id = cp.title_id and cp.channel_id = '.$channelId;
        
            $titles = DB::select($query);
        
            $titles = json_decode(json_encode($titles),TRUE);
        
            // dd($titles);
            $this->page_loader("channel_permitted_titles",[
                "title" => "Titles allowed for channel",
                "allowed_titles" => $titles
            ]);


        }else{

            return redirect()->to(url("/"));

        }
        
    }

}
