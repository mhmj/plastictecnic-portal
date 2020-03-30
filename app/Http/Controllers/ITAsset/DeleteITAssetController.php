<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30/3/2020
 * Time: 1:59 PM
 */

namespace App\Http\Controllers\ITAsset;


use App\Classes\Modules\ControllerLogic\ITAsset\DeleteITAssetLogic;

class DeleteITAssetController
{
    public function delete(String $ITAssetID, DeleteITAssetLogic $logic)
    {
        return $logic->execute($ITAssetID);
    }
}