<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30/3/2020
 * Time: 1:58 PM
 */

namespace App\Http\Controllers\ITAsset;


use App\Classes\Modules\ControllerLogic\ITAsset\CreateITAssetLogic;
use Illuminate\Http\Request;

class CreateITAssetController
{
    public function create(CreateITAssetLogic $logic, Request $request )
    {
        return $logic->execute($request);
    }
}