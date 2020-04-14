<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/4/2020
 * Time: 5:54 PM
 */

namespace App\Http\Controllers\Staff;


use App\Classes\Modules\ControllerLogic\Staff\SearchStaffLogic;

class SearchStaffController
{
    public function search($id, $query, SearchStaffLogic $logic)
    {
        return $logic->execute($id,$query);
    }

}