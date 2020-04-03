<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30/3/2020
 * Time: 1:20 PM
 */

namespace App\Classes\Modules\ITAsset\Services;


use App\Classes\Modules\ITAsset\DataTransferObject\ITAssetObject;
use App\ITAsset;
use App\Http\Resources\ITAsset as ITAssetResources;

class UpdatesITAsset
{
    /** @var  ITAsset */
    private $repository;

    /**
     * UpdatesITAsset constructor.
     * @param ITAsset $repository
     */
    public function __construct(ITAsset $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $ITAssetID,ITAssetObject $object){

        $ITasset = $this->repository->findOrFail($ITAssetID);

        $ITasset->asset_category_id = $object->getAssetCategoryId();
        $ITasset->company_id = $object->getCompanyId();
        //$ITasset->staff_id = $object->getStaffId();
        $ITasset->it_asset_brand_id = $object->getItAssetBrandId();
        $ITasset->model = $object->getModel();
        $ITasset->serial_no = $object->getSerialNo();
        $ITasset->service_tag = $object->getServiceTag();
        $ITasset->year_purchased = $object->getYearPurchased();
        $ITasset->warranty_status = $object->getWarrantyStatus();
        $ITasset->warranty_period = $object->getWarrantyPeriod();


        if($ITasset->save()){
            return new ITAssetResources($ITasset);
        }

    }


}