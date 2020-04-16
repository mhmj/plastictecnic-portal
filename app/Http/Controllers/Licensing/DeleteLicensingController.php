<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:43 PM
 */

namespace App\Http\Controllers\Licensing;


use App\Classes\Modules\ControllerLogic\Licensing\DeleteLicensingLogic;

class DeleteLicensingController
{
    public function delete($id, DeleteLicensingLogic $logic)
    {
        return $logic->execute($id);
    }
}