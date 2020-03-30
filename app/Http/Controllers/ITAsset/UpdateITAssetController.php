<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30/3/2020
 * Time: 1:59 PM
 */

namespace App\Http\Controllers\ITAsset;


use App\Classes\Modules\ControllerLogic\ITAsset\UpdateITAssetLogic;
use Illuminate\Http\Request;

class UpdateITAssetController
{

    public function update(string $ITAssetID, Request $request, UpdateITAssetLogic $logic)
    {
        return $logic->execute($ITAssetID,$request);
    }

}