<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/6/2020
 * Time: 4:51 PM
 */

namespace App\Http\Controllers\DailyHealth;


use App\Classes\Modules\ControllerLogic\DailyHealth\ListAllDailyHealthLogic;

class ListAllDailyHealthController
{
    public function list($companyId, $today, ListAllDailyHealthLogic $logic)
    {
        return $logic->execute($companyId,$today);
    }
}