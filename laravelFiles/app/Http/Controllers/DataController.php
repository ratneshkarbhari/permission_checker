<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\ChannelPermission;
use App\Models\Title;
use Illuminate\Http\Request;

class DataController extends Controller
{
    
    function upload(Request $request) {
        
        if($request->hasFile("rights_data")){

            $dataFile = $request->file("rights_data");

            $dataFileName = $dataFile->getClientOriginalName();

            $dataFile->move("./assets/uploads/",$dataFileName);

            $uploadedFilePath = "./assets/uploads/".$dataFileName;

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($uploadedFilePath);

            $allData = $spreadsheet->getActiveSheet()->toArray();
    
            $keys = $allData[0];

            unset($allData[0]);

            $titleChannelPermissionObj = [];

            foreach($allData as $titleDataPoint){

                $title = $titleDataPoint[1];
                $cast = $titleDataPoint[2];
                $yearOfRelease = $titleDataPoint[3];
                $language = $titleDataPoint[4];
                $lot = $titleDataPoint[5];
                $fullMovie = $titleDataPoint[6];
                $scene = $titleDataPoint[7];
                $song = $titleDataPoint[8];
    
                $titleObj = [
                    "name" => $title,
                    "cast" => $cast,
                    "yor" => $yearOfRelease,
                    "language" => $language,
                    "lot" => $lot,
                    "full_movie" => $fullMovie,
                    "scene" => $scene,
                    "song" => $song
                ];

                $titleData = Title::where("name",$titleDataPoint[1])->first();

                if($titleData==null){

                    $titleId = Title::insertGetId($titleObj);

                }else{

                    $titleId = $titleData["id"];
                
                }
                

                $titleChannelPermissionEntity = [];


                for ($i=9; $i < 69; $i++) { 

                    if($titleDataPoint[$i]=="YES"){

                        $titleChannelPermissionEntity = [
                            "channel_id" => $i-8,
                            "title_id" => $titleId,
                        ];
    
                        $titleChannelPermissionObj[] = $titleChannelPermissionEntity;
    
    

                    }
                    

                }



                ChannelPermission::insert($titleChannelPermissionObj);



            }





            
        }else{

            echo "please upload file";

        }

    }

}
