<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/4/2020
 * Time: 11:10 PM
 */

namespace App\Http\Controllers\Staff;


use App\Classes\Modules\ControllerLogic\Staff\DeleteStaffLogic;

class DeleteStaffController
{
    public function delete(string $staffID, DeleteStaffLogic $logic)
    {
        return $logic->execute($staffID);
    }
}