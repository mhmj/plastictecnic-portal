<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/6/2020
 * Time: 2:09 PM
 */

namespace App\Http\Controllers\DailyHealth;


use App\Classes\Modules\ControllerLogic\DailyHealth\ListAllNotDoneDailyHealthLogic;

class ListAllNotDoneDailyHealthController
{
    public function list($companyId, $date, ListAllNotDoneDailyHealthLogic $logic)
    {
        return $logic->execute($companyId,$date);
    }
}