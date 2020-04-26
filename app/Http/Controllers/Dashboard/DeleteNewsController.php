<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/4/2020
 * Time: 8:33 PM
 */

namespace App\Http\Controllers\Dashboard;


use App\Classes\Modules\ControllerLogic\Dashboard\DeleteNewsLogic;

class DeleteNewsController
{
    public function delete($id, DeleteNewsLogic $logic)
    {
        return $logic->execute($id);
    }
}