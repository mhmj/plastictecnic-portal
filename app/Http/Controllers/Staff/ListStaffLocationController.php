<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/4/2020
 * Time: 8:28 PM
 */

namespace App\Http\Controllers\Staff;


use App\Classes\Modules\ControllerLogic\Staff\ListStaffLocationLogic;

class ListStaffLocationController
{
    public function list (int $id, string $category, ListStaffLocationLogic $logic)
    {
        return $logic->execute($id, $category);
    }

}