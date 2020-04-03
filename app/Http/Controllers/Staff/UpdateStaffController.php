<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/4/2020
 * Time: 11:09 PM
 */

namespace App\Http\Controllers\Staff;


use App\Classes\Modules\ControllerLogic\Staff\UpdateStaffLogic;
use Illuminate\Http\Request;

class UpdateStaffController
{
    public function update(string $staffID, Request $request, UpdateStaffLogic $logic)
    {
        return $logic->execute($staffID, $request);
    }
}