<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/5/2020
 * Time: 9:50 AM
 */

namespace App\Http\Controllers\DailyHealth;


use App\Classes\Modules\ControllerLogic\DailyHealth\DeleteStaffDailyHealthLogic;

class DeleteStaffDailyHealthController
{
    public function delete($id, DeleteStaffDailyHealthLogic $logic)
    {
        return $logic->execute($id);
    }
}