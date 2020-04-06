<?php

namespace App\Http\Controllers;

use App\ImportITAssetcsv;
use Illuminate\Http\Request;
use Session;

class ImportITAssetController extends Controller
{
    public function index()
    {
        return view('pages.ITAsset.ImportITAssetcsv');
    }

    public function uploadFile(Request $request){

        if ($request->input('submit') != null ){

            $file = $request->file('file');

            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();

            // Valid File Extensions
            $valid_extension = array("csv");

            // 2MB in Bytes
            $maxFileSize = 2097152;

            // Check file extension
            if(in_array(strtolower($extension),$valid_extension)){

                // Check file size
                if($fileSize <= $maxFileSize){

                    // File upload location
                    $location = 'uploads';

                    // Upload file
                    $file->move($location,$filename);

                    // Import CSV to Database
                    $filepath = public_path($location."/".$filename);

                    // Reading file
                    $file = fopen($filepath,"r");

                    $importData_arr = array();
                    $i = 0;

                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata );

                        // Skip first row (Remove below comment if you want to skip the first row)
                        if($i == 0){
                            $i++;
                            continue;
                        }
                        for ($c = 0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata [$c];
                        }
                        $i++;
                    }
                    fclose($file);

                    // Insert to MySQL database
                    foreach($importData_arr as $importData){

                        $insertData = array(
                            "asset_category_id"=>$importData[0],
                            "company_id"=>$importData[1],
                            "it_asset_brand_id"=>$importData[2],
                            "model"=>$importData[3],
                            "OS"=>$importData[4],
                            "computer_name"=>$importData[5],
                            "username"=>$importData[6],
                            "office"=>$importData[7],
                            "remark"=>$importData[8],
                            "serial_no"=>$importData[9],
                            "year_purchased"=>$importData[10],
                            "status"=>$importData[11],
                            "created_at"=>$importData[12],
                            "updated_at"=>$importData[13],

                        );
                        ImportITAssetcsv::insertData($insertData);

                    }

                    Session::flash('message','Import Successful.');
                }else{
                    Session::flash('message','Import Successful.');
                }

            }else{
                Session::flash('message','Import Successful.');
            }

        }

        // Redirect to index
        return redirect()->action('ImportITAssetController@index');
    }
}
