<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\ChannelPermission;
use App\Models\Manager;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PageLoader extends Controller
{

    private function page_loader($viewName,$data){
        echo view("templates/header",$data);
        echo view("pages/".$viewName,$data);
        echo view("templates/footer",$data);
    }


    function upload_monthly_data(){
        // if(session("user_type")=="rights-admin"){
            $this->page_loader("upload_monthly_data",["title"=>"Upload Monthly Data"]);
        // }

    }

    function user_dashboard() {

        if(in_array(session("user_type"),['channel-manager','group-manager'])){


            if(session("is_gm")){
            
                $channels = DB::table("channels")
                ->join("managers", function($join){
                    $join->on("channels.manager", "=", "managers.id");
                })
                ->select("channels.id", "channels.name", "channels.manager", "managers.name as manager_name")
                ->where("managers.group_code", "=", session("group"))
                ->get();
    
                $channels = json_decode($channels,TRUE);
    
    
            }else{
    
                $channels = Channel::where("manager",session("manager_id"))->get();
    
            }
            
            
    
            $this->page_loader("manager_channels",[
                "title" => "Your Channels",
                "channels" => $channels
            ]);

        }elseif(session("user_type")=="rights-admin"){
            $this->page_loader("dashboard",[
                "title" => "Rights Admin",
            ]);

            
        }else{
            return redirect()->to(url("user-login"));
        }

       
        
        

    }

    function add_new_title() {


        $allChannels = Channel::all();

        
        $this->page_loader("add_new_title",[
            "title" => "Add new Title",
            "channels" => $allChannels,
        ]);


    }
    

    function edit_title($id) {
        
        $titleData = Title::find($id);

        $allChannels = Channel::all();


        $queryToGetChannelIds = 'SELECT GROUP_CONCAT(channel_id) as id FROM `channel_permissions` WHERE title_id = '.$id;

        $cidsWRights = DB::select($queryToGetChannelIds);
            
        $cidsWRights = json_decode(json_encode($cidsWRights),TRUE);



        $cidsWRights = explode(",",$cidsWRights[0]["id"]);



        $this->page_loader("edit_title",[
            "title" => "Edit Title : ".$titleData["name"],
            "titleData" => $titleData,
            "channels" => $allChannels,
            "channel_ids_with_rights" => $cidsWRights
        ]);

    }

    function manage_channels() {
        
        $channels = Channel::with("manager_data")->get();

        $this->page_loader("manage_channels",[
            "title" => "Manage Channels",
            "channels" => $channels
        ]);

    }

    function manage_titles() {
        
        $titles = Title::all();

        $this->page_loader("manage_titles",[
            "title" => "Manage titles",
            "titles" => $titles
        ]);

    }

    function user_login(){


        $this->page_loader("user_login",[
            "title" => "User Login"
        ]);

    }

    function manage_managers() {
        

        $allManagers = Manager::all();

        $this->page_loader("manage_managers",[
            "title" => "All Managers",
            "managers" => $allManagers
        ]);


    }

    function see_titles($channelId){

        $heroChannel = Channel::where("id",$channelId)->with("manager_data")->first();


        if($heroChannel){

            if(!session("is_gm")){

                if($heroChannel["manager"]!=session("manager_id")){
                    return redirect()->to(url("/"));
                }

            }else{

                

                if(session("group")!=$heroChannel["manager_data"]["group_code"]){
                    return redirect()->to(url("/"));
                }

            }

            if(!$titles = Cache::get("channel-".$channelId)){
                $query = 'select DISTINCT t.name,t.full_movie,t.scene,t.song,t.grading,t.lot,t.language,t.yor,t.cast from titles t, channel_permissions cp, channels c where t.id = cp.title_id and cp.channel_id = '.$channelId;
        
                $titles = DB::select($query);
            
                $titles = json_decode(json_encode($titles),TRUE);
            }
                

       

            
            $this->page_loader("channel_permitted_titles",[
                "title" => "Titles allowed for channel",
                "allowed_titles" => $titles,
                "channel"=>$heroChannel
            ]);


        }else{

            return redirect()->to(url("/"));

        }
        
    }

}
