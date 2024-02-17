<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;

class Managers extends Controller
{
 
    function create(Request $request) {
        
        if($request->name==""||$request->email==""){
            return [
                "result"=>"failure",
                "message"=>"Please enter name and email"
            ];
        }else{

            $ptPassword = md5($request->email);
            $passwordHash = password_hash($ptPassword,PASSWORD_DEFAULT);

            if(!Manager::where("email",$request->email)->first()){

                if(Manager::insert(
                    [
                        "name" => $request->name,
                        "email" => $request->email,
                        "pt_password" => $ptPassword,
                        "password"=>$passwordHash,
                        "is_gm" => $request->is_gm,
                        "group_code" => $request->group_code
                    ]
                )){
                    return [
                        "result"=>"success",
                        "manager"=>[
                            "name" => $request->name,
                            "email" => $request->email,
                            "pt_password" => $ptPassword,
                            "password"=>$passwordHash,
                            "is_gm" => $request->is_gm,
                            "group_code" => $request->group_code
                        ]
                    ];
                }else{
                    return [
                        "result"=>"failure",
                        "message"=>"Manager creation failed"
                    ];
                }

            }else{

                return [
                    "result"=>"failure",
                    "message"=>"Manager with this email exists"
                ];

            }



        }

    }
    
    function update(Request $request) {
        
        $managerData = Manager::find($request->id);

        if($managerData){

            $ptPassword = md5($request->email);
            $passwordHash = password_hash($ptPassword,PASSWORD_DEFAULT);

            if(is_null($request->is_gm)){
                $request->is_gm = 0;
            }

            if ($managerData->update([
                    "name" => $request->name,
                    "email" => $request->email,
                    "pt_password" => $ptPassword,
                    "password"=>$passwordHash,
                    "is_gm" => $request->is_gm,
                    "group_code" => $request->group_code
                ])) {
            
                return [
                    "result" => "success",
                    "manager" => $managerData
                ];
                
            } else {
                return [
                    "result"=>"failure",
                    "message"=>"Manager update failed"
                ];
            }
            

        }else{
            return [
                "result"=>"failure",
                "message"=>"Manager doesnt exist"
            ];
        }

    }

}
