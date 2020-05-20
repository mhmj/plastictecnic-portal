<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19/5/2020
 * Time: 1:43 PM
 */

namespace App\Http\Controllers\DailyHealth;


use App\Classes\Modules\ControllerLogic\DailyHealth\CreateStaffDailyHealthLogic;
use Illuminate\Http\Request;

class CreateStaffDailyHealthController
{
    public function create(Request $request, CreateStaffDailyHealthLogic $logic)
    {
        return $logic->execute($request);
    }
}