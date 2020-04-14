<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/4/2020
 * Time: 9:07 PM
 */

namespace App\Http\Controllers\Common;


use App\Classes\Modules\ControllerLogic\Common\ProfileDetailsLogic;

class ProfileDetailsController
{
    public function profile($id, ProfileDetailsLogic $logic)
    {
        return $logic->execute($id);
    }

    public function changePassword($id, $new_password, ProfileDetailsLogic $logic)
    {
        return $logic->changePassword($id, $new_password);
    }

}