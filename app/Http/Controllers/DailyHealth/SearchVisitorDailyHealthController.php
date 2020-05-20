<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13/5/2020
 * Time: 4:17 PM
 */

namespace App\Http\Controllers\DailyHealth;


use App\Classes\Modules\ControllerLogic\DailyHealth\SearchVisitorDailyHealthLogic;

class SearchVisitorDailyHealthController
{
    public function search($id, $query, SearchVisitorDailyHealthLogic $logic)
    {
        return $logic->execute($id,$query);
    }
}