<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/6/2020
 * Time: 11:17 AM
 */

namespace App\Http\Controllers\DailyHealth;


use App\Classes\Modules\ControllerLogic\DailyHealth\SearchAllDailyHealthByDateLogic;
use App\Classes\Modules\ControllerLogic\DailyHealth\SearchStaffDailyHealthByDateLogic;

class SearchAllDailyHealthByDateController
{
    public function search($companyId, $query, SearchAllDailyHealthByDateLogic $logic)
    {
        return $logic->execute($companyId, $query);
    }
}