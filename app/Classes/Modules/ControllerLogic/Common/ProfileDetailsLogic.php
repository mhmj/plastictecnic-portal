<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/4/2020
 * Time: 9:08 PM
 */

namespace App\Classes\Modules\ControllerLogic\Common;


use App\Classes\Modules\Common\Services\ProfilesDetails;
use Illuminate\Http\Request;

class ProfileDetailsLogic
{
    /** @var  ProfilesDetails */
    private $ProfilesDetails;

    /**
     * ProfileDetailsLogic constructor.
     * @param ProfilesDetails $ProfilesDetails
     */
    public function __construct(ProfilesDetails $ProfilesDetails)
    {
        $this->ProfilesDetails = $ProfilesDetails;
    }

    public function execute($id)
    {
        return $this->ProfilesDetails->execute($id);
    }

    public function changePassword($id,$new_password)
    {
        return $this->ProfilesDetails->changePassword($id, $new_password);
    }

    public function changeProfilePicture($id, Request $request)
    {
        return $this->ProfilesDetails->changeProfilePicture($id, $request);
    }

}