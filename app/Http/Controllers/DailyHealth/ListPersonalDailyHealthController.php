<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19/5/2020
 * Time: 2:46 PM
 */

namespace App\Http\Controllers\DailyHealth;


use App\Classes\Modules\ControllerLogic\DailyHealth\ListPersonalDailyHealthLogic;

class ListPersonalDailyHealthController
{
    public function list($companyId, $staffId, ListPersonalDailyHealthLogic $logic)
    {
        return $logic->execute($companyId, $staffId);
    }
}