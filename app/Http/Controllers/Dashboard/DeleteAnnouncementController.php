<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23/4/2020
 * Time: 10:24 PM
 */

namespace App\Http\Controllers\Dashboard;


use App\Classes\Modules\ControllerLogic\Dashboard\DeleteAnnouncementLogic;

class DeleteAnnouncementController
{
    public function delete($id, DeleteAnnouncementLogic $logic)
    {
        return $logic->exucute($id);
    }
}