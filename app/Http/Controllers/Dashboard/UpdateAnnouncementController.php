<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/4/2020
 * Time: 11:16 PM
 */

namespace App\Http\Controllers\Dashboard;


use App\Classes\Modules\ControllerLogic\Dashboard\UpdateAnnouncementLogic;
use Illuminate\Http\Request;

class UpdateAnnouncementController
{
    public function update($id, Request $request, UpdateAnnouncementLogic $logic)
    {
        return $logic->execute($id, $request);
    }
}