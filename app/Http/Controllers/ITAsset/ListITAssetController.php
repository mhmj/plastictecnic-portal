<?php

namespace App\Http\Controllers\ITAsset;


use App\Classes\Modules\ControllerLogic\ITAsset\ListITAssetLogic;

class ListITAssetController
{
    public function record(ListITAssetLogic $logic){

    return $logic->execute();
}
}