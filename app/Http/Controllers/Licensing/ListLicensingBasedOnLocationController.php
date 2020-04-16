<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:42 PM
 */

namespace App\Http\Controllers\Licensing;


use App\Classes\Modules\ControllerLogic\Licensing\ListLicensingLocationLogic;

class ListLicensingBasedOnLocationController
{
    public function list($id, $category, ListLicensingLocationLogic $logic)
    {
        return $logic->execute($id, $category);
    }
}