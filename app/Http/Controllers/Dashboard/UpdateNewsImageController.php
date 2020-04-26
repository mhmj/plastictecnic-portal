<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27/4/2020
 * Time: 2:05 AM
 */

namespace App\Http\Controllers\Dashboard;


use App\Classes\Modules\ControllerLogic\Dashboard\UpdateNewsImageLogic;
use Illuminate\Http\Request;

class UpdateNewsImageController
{
    public function updateNewsImage($id, Request $request, UpdateNewsImageLogic $logic)
    {
        return $logic->execute($id,$request);
    }
}