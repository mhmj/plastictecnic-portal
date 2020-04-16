<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:43 PM
 */

namespace App\Http\Controllers\Licensing;


use App\Classes\Modules\ControllerLogic\Licensing\CreateLicensingLogic;
use Illuminate\Http\Request;

class CreateLicensingController
{
    public function create(Request $request, CreateLicensingLogic $logic)
    {
        return $logic->execute($request);
    }
}