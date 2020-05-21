<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/5/2020
 * Time: 1:48 PM
 */

namespace App\Http\Controllers\DailyHealth;


use App\Classes\Modules\ControllerLogic\DailyHealth\SearchStaffDailyHealthByDateLogic;

class SearchStaffDailyHealthByDateController
{
    public function search($id, $query, SearchStaffDailyHealthByDateLogic $logic)
    {
        return $logic->execute($id,$query);
    }
}