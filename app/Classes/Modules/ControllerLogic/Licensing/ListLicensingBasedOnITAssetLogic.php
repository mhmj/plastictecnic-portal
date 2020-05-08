<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 8/5/2020
 * Time: 2:14 PM
 */

namespace App\Classes\Modules\ControllerLogic\Licensing;


use App\Classes\Modules\Licensing\Services\ListsLicensingBasedOnITAsset;

class ListLicensingBasedOnITAssetLogic
{
    /** @var  ListsLicensingBasedOnITAsset */
    private $ListsLicensingBasedOnITAsset;

    /**
     * ListLicensingBasedOnITAssetLogic constructor.
     * @param ListsLicensingBasedOnITAsset $ListsLicensingBasedOnITAsset
     */
    public function __construct(ListsLicensingBasedOnITAsset $ListsLicensingBasedOnITAsset)
    {
        $this->ListsLicensingBasedOnITAsset = $ListsLicensingBasedOnITAsset;
    }

    public function execute($id)
    {
        return $this->ListsLicensingBasedOnITAsset->execute($id);
    }


}