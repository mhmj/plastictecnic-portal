<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:44 PM
 */

namespace App\Http\Controllers\Licensing;


use App\Classes\Modules\ControllerLogic\Licensing\SearchLicensingLogic;

class SearchLicensingController
{
    public function search($id, $query, SearchLicensingLogic $logic)
    {
        return $logic->execute($id, $query);
    }
}