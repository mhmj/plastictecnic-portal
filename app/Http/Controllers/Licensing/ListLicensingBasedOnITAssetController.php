<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 8/5/2020
 * Time: 2:13 PM
 */

namespace App\Http\Controllers\Licensing;


use App\Classes\Modules\ControllerLogic\Licensing\ListLicensingBasedOnITAssetLogic;

class ListLicensingBasedOnITAssetController
{
    public function list($id, ListLicensingBasedOnITAssetLogic $logic)
    {
        return $logic->execute($id);
    }
}