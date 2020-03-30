<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30/3/2020
 * Time: 2:00 PM
 */

namespace App\Http\Controllers\ITAsset;


use App\Classes\Modules\ControllerLogic\ITAsset\AssignITAssetLogic;
use Illuminate\Http\Request;

class AssignITAssetController
{
    public function assign(String $ITAssetId, Request $request, AssignITAssetLogic $logic)
    {
        return $logic->execute($ITAssetId, $request);
    }

}