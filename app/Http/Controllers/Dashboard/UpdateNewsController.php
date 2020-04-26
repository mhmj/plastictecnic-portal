<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/4/2020
 * Time: 8:32 PM
 */

namespace App\Http\Controllers\Dashboard;


use App\Classes\Modules\ControllerLogic\Dashboard\UpdateNewsLogic;
use Illuminate\Http\Request;

class UpdateNewsController
{
    public function update($id, Request $request, UpdateNewsLogic $logic)
    {
        return $logic->execute($id, $request);
    }
}