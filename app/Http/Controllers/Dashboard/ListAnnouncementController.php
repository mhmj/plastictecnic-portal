<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/4/2020
 * Time: 4:06 PM
 */

namespace App\Http\Controllers\Dashboard;


use App\Classes\Modules\ControllerLogic\Dashboard\ListAnnouncementLogic;

class ListAnnouncementController
{
    public function list(ListAnnouncementLogic $logic)
    {
        return $logic->execute();
    }
}