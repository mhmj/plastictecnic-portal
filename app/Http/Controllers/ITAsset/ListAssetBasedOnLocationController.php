<?php

namespace App\Http\Controllers\ITAsset;

use App\Classes\Modules\ControllerLogic\ITAsset\ListITAssetLocationLogic;

class ListAssetBasedOnLocationController
{
    public function list (int $id, string $category, ListITAssetLocationLogic $logic)
    {
        return $logic->execute($id, $category);
    }
}