<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/4/2020
 * Time: 8:23 PM
 */

namespace App\Http\Controllers\Dashboard;


use App\Classes\Modules\ControllerLogic\Dashboard\NewsDetailsLogic;

class NewsDetailsController
{
    public function details($id, NewsDetailsLogic $logic)
    {
        return $logic->execute($id);
    }
}