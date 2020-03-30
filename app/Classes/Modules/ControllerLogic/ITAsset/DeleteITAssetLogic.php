<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30/3/2020
 * Time: 1:25 PM
 */

namespace App\Classes\Modules\ControllerLogic\ITAsset;


use App\Classes\Modules\ITAsset\Services\DeletesITAsset;

class DeleteITAssetLogic
{
    /** @var  DeletesITAsset */
    private $DeletesITAsset;

    /**
     * DeleteITAssetLogic constructor.
     * @param DeletesITAsset $DeletesITAsset
     */
    public function __construct(DeletesITAsset $DeletesITAsset)
    {
        $this->DeletesITAsset = $DeletesITAsset;
    }

    public function execute(String $ITAssetID)
    {
        return $this->DeletesITAsset->execute($ITAssetID);
    }



}