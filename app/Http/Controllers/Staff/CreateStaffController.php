<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/4/2020
 * Time: 11:08 PM
 */

namespace App\Http\Controllers\Staff;


use App\Classes\Modules\ControllerLogic\Staff\CreateStaffLogic;
use Illuminate\Http\Request;

class CreateStaffController
{
    public function create( Request $request, CreateStaffLogic $logic){

        return $logic->execute($request);
    }
}