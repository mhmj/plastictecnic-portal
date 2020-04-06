<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ImportITAssetcsv extends Model
{
    public static function insertData($data)
    {

            DB::table('it_asset')->insert($data);
    }
}
