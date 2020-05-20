<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13/5/2020
 * Time: 3:59 PM
 */

namespace App\Http\Controllers\DailyHealth;


use App\Classes\Modules\ControllerLogic\DailyHealth\ListVisitorDailyHealthBasedOnLocationLogic;

class ListVisitorDailyHealthBasedOnLocationController
{
    public function list($id, $category, ListVisitorDailyHealthBasedOnLocationLogic $logic)
    {
        return $logic->execute($id,$category);
    }
}