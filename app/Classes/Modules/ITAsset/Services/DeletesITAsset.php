<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30/3/2020
 * Time: 1:20 PM
 */

namespace App\Classes\Modules\ITAsset\Services;


use App\ITAsset;
use App\Http\Resources\ITAsset as ITAssetResources;

class DeletesITAsset
{
    /** @var  ITAsset */
    private $repository;

    /**
     * DeletesITAsset constructor.
     * @param ITAsset $repository
     */
    public function __construct(ITAsset $repository)
    {
        $this->repository = $repository;
    }

    public function execute(String $ITAssetID)
    {
        $ITAsset = $this->repository->findOrFail($ITAssetID);

        if($ITAsset->delete()){

            return new ITAssetResources($ITAsset);
        }
    }


}