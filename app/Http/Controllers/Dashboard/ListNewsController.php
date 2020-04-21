<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/4/2020
 * Time: 5:57 PM
 */

namespace App\Http\Controllers\Dashboard;


use App\Classes\Modules\ControllerLogic\Dashboard\ListNewsLogic;

class ListNewsController
{
    public function list(ListNewsLogic $logic)
    {
        return $logic->execute();
    }
}