<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/4/2020
 * Time: 10:22 PM
 */

namespace App\Http\Controllers\Dashboard;


use App\Classes\Modules\ControllerLogic\Dashboard\CreateAnnouncementLogic;
use Illuminate\Http\Request;

class CreateAnnouncementController
{
    public function create(Request $request, CreateAnnouncementLogic $logic)
    {
        return $logic->execute($request);
    }
}