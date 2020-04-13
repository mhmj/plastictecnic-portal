<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13/4/2020
 * Time: 6:18 PM
 */

namespace App\Classes\Modules\ControllerLogic\ITAsset\Staff;


use App\Classes\Modules\ITAsset\Services\Staff\StaffListsITAsset;

class StaffListITAssetLogic
{
    /** @var  StaffListsITAsset */
    private $StaffListsITAsset;

    /**
     * StaffListITAssetLogic constructor.
     * @param StaffListsITAsset $StaffListsITAsset
     */
    public function __construct(StaffListsITAsset $StaffListsITAsset)
    {
        $this->StaffListsITAsset = $StaffListsITAsset;
    }

    public function execute(int $id)
    {
        return $this->StaffListsITAsset->excute($id);
    }


}