<?php

namespace App\Http\Controllers;

use App\ImportStaffcsv;
use Illuminate\Http\Request;
use Session;

class ImportStaffController extends Controller
{
    public function index(){
        return view('pages.Staff.ImportStaffcsv');
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
                            "staff_no"=>$importData[0],
                            "full_name"=>$importData[1],
                            "username"=>$importData[2],
                            "company_id"=>$importData[3],
                            "department_id"=>$importData[6],
                            "designation_id"=>$importData[7],
                            "email"=>$importData[8],
                            "role_id"=>$importData[9],
                            "password"=>$importData[10],
                            "created_at"=>$importData[11],
                            "updated_at"=>$importData[12],

                        );
                        ImportStaffcsv::insertData($insertData);

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
        return redirect()->action('ImportStaffController@index');
    }
}
