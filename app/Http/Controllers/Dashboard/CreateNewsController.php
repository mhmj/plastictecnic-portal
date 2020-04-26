<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/4/2020
 * Time: 1:21 AM
 */

namespace App\Http\Controllers\Dashboard;


use App\Classes\Modules\ControllerLogic\Dashboard\CreateNewsLogic;
use Illuminate\Http\Request;

class CreateNewsController
{
    public function create(Request $request, CreateNewsLogic $logic)
    {
        return $logic->execute($request);
    }
}