<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Authentication extends Controller
{

    function logout() {
        
        Session::flush();

        return redirect()->to(url("user-login"));

    }

    function set_password(){
        
        $managers = Manager::all();

        foreach($managers as $manager){

            $email = $manager["email"];
            $ptPassword = md5($email);

            $manager->pt_password = $ptPassword;
            $manager->password = password_hash($ptPassword,PASSWORD_DEFAULT);

            $manager->save();

        }

    }
    
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
                        "manager_id" => $managerData["id"],
                        "is_gm" => $managerData["is_gm"],
                        "group" => $managerData["group_code"]
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
