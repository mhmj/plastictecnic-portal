<?php

namespace App\Http\Controllers\Staff;


use App\Classes\Modules\ControllerLogic\Staff\ListStaffLogic;

class ListStaffController
{
    public function record(ListStaffLogic $logic)
    {
        return $logic->execute();
    }
}