<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13/4/2020
 * Time: 6:12 PM
 */

namespace App\Http\Controllers\ITAsset\Staff;


use App\Classes\Modules\ControllerLogic\ITAsset\Staff\StaffListITAssetLogic;

class ListITAssetController
{
    public function record(int $id, StaffListITAssetLogic $logic)
    {
        return $logic->execute($id);
    }
}