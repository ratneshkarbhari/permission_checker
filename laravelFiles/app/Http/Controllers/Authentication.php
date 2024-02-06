<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;

class Authentication extends Controller
{
    
    function user_login(Request $request){
        
        $emailEntered = $request->email;
        $passwordEntered = $request->password;

        if($emailEntered==""||$passwordEntered==""){
            return [
                "result" => "failure",
                "message" => "Please enter both email and password"
            ];
        }else{
            $managerData = Manager::where("email",$emailEntered)->first();
            if($managerData){

                if(password_verify($passwordEntered,$managerData["password"])){

                    session([
                        "name" => $managerData["name"],
                        "email" => $managerData["email"],
                        "user_type" => "channel-manager",
                        "manager_id" => $managerData["id"]
                    ]);

                    return [
                        "result" => "success",
                        "user" => $managerData
                    ];

                }else{
                    return [
                        "result" => "failure",
                        "message" => "Password is incorrect"
                    ];
                }

            }else{
                return [
                    "result" => "failure",
                    "message" => "Email is incorrect"
                ];
            }
        }

    }

}
