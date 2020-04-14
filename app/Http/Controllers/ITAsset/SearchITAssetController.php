<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/4/2020
 * Time: 2:10 PM
 */

namespace App\Http\Controllers\ITAsset;


use App\Classes\Modules\ControllerLogic\ITAsset\SearchITAssetLogic;
use Illuminate\Http\Request;

class SearchITAssetController
{
    public function search($id, $query, SearchITAssetLogic $logic)
    {
        return $logic->execute($id, $query);
    }
}