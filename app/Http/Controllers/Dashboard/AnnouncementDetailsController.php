<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/4/2020
 * Time: 4:14 PM
 */

namespace App\Http\Controllers\Dashboard;


use App\Classes\Modules\ControllerLogic\Dashboard\AnnouncementDetailsLogic;

class AnnouncementDetailsController
{
    public function details($id, AnnouncementDetailsLogic $logic)
    {
        return $logic->execute($id);
    }
}