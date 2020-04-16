<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:43 PM
 */

namespace App\Http\Controllers\Licensing;


use App\Classes\Modules\ControllerLogic\Licensing\UpdateLicensingLogic;
use Illuminate\Http\Request;

class UpdateLicensingController
{
    public function update($id, Request $request, UpdateLicensingLogic $logic)
    {
        return $logic->execute($id, $request);
    }
}