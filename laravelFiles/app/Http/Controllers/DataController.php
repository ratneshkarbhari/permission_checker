<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\ChannelPermission;
use App\Models\Manager;
use App\Models\Title;
use Illuminate\Http\Request;

class DataController extends Controller
{

    function channel_managers_import(){
        
        $path = "./assets/uploads/channel_managers.csv";

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);

        $allData = $spreadsheet->getActiveSheet()->toArray();

        unset($allData[0]);

        foreach($allData as $managerDataPoint){

            $name = $managerDataPoint[1];

            $group = $managerDataPoint[2];
    
            $email = $managerDataPoint[3];
    
            $password = NULL;
    
            $managerObj = [
                "name" => $name,
                "email" => $email,
                "password" => $password,
                "group_code"=> $group
            ];
    
            if($managerData = Manager::where("email",$email)->first()){
                $managerData->update($managerObj);
            }else{
                Manager::insert($managerObj);
            }
    

        }


    }
    
    function upload(Request $request) {
        
        if($request->hasFile("rights_data")){

            $dataFile = $request->file("rights_data");

            $dataFileName = $dataFile->getClientOriginalName();

            $dataFile->move("./assets/uploads/",$dataFileName);

            $uploadedFilePath = "./assets/uploads/".$dataFileName;

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($uploadedFilePath);

            $allData = $spreadsheet->getActiveSheet()->toArray();
    

            unset($allData[0]);


            $chunks = array_chunk($allData,200);

            foreach($chunks as $chunk){

                $titleMasterObj = [];

                $titleChannelPermissionMasterObj = [];

                foreach($chunk as $titleDataPoint){

                    $title = $titleDataPoint[1];
                    $cast = $titleDataPoint[2];
                    $yearOfRelease = $titleDataPoint[3];
                    $language = $titleDataPoint[4];
                    $lot = $titleDataPoint[5];
                    $grading = $titleDataPoint[6];
                    $fullMovie = $titleDataPoint[7];
                    $scene = $titleDataPoint[8];
                    $song = $titleDataPoint[9];
        
                    $titleObj = [
                        "name" => $title,
                        "cast" => $cast,
                        "yor" => $yearOfRelease,
                        "language" => $language,
                        "lot" => $lot,
                        "grading" => $grading,
                        "full_movie" => $fullMovie,
                        "scene" => $scene,
                        "song" => $song
                    ];


                    $titleMasterObj[] = $titleObj;

                    
    
    
    
                    for ($i=10; $i < 69; $i++) { 
    
                        if($titleDataPoint[$i]=="YES"){
    
                            $titleChannelPermissionEntity = [
                                "channel_id" => $i-9,
                                "title_id" => $titleDataPoint[0],
                            ];
        
                            $titleChannelPermissionMasterObj[] = $titleChannelPermissionEntity;    

    
                        }
                        
    
                    }

    
                    
    
    
    
                }

                // dd($titleMasterObj);

                // dd($titleChannelPermissionMasterObj);


                Title::insert($titleMasterObj);
                ChannelPermission::insert($titleChannelPermissionMasterObj);


            }





            
        }else{

            echo "please upload file";

        }

    }

}
