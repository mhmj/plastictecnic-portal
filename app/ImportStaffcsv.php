<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ImportStaffcsv extends Model
{
    public static function insertData($data)
    {
            DB::table('staff')->insert($data);
    }
}
