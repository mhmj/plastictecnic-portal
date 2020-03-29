<?php

namespace App\Classes\Modules\ControllerLogic\ITAsset;

use App\Classes\Modules\ITAsset\Services\ListsITAsset;

class ListITAssetLogic
{
    /** @var  ListsITAsset */
    private $ListITAsset;

    /**
     * ListITAssetLogic constructor.
     * @param ListsITAsset $ListITAsset
     */
    public function __construct(ListsITAsset $ListITAsset)
    {
        $this->ListITAsset = $ListITAsset;
    }


    public function execute(){

        return $this->ListITAsset->execute() ;
    }

}