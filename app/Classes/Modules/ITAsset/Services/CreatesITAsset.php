<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30/3/2020
 * Time: 1:19 PM
 */

namespace App\Classes\Modules\ITAsset\Services;


use App\Classes\Modules\ITAsset\DataTransferObject\ITAssetObject;
use App\ITAsset;

class CreatesITAsset
{

    /** @var  ITAsset */
    private $repository;

    /**
     * CreatesITAsset constructor.
     * @param ITAsset $repository
     */
    public function __construct(ITAsset $repository)
    {
        $this->repository = $repository;
    }

    public function execute(ITAssetObject $object){

        $model = $this->repository->create([
            'asset_category_id' => $object->getAssetCategoryId(),
            'company_id' => $object->getCompanyId(),
            'staff_id' => $object->getStaffId(),
            'it_asset_brand_id' => $object->getItAssetBrandId(),
            'model' => $object->getModel(),
            'serial_no' => $object->getSerialNo(),
            'service_tag' => $object->getServiceTag(),
            'year_purchased' => $object->getYearPurchased(),
            'warranty_status' => $object->getWarrantyStatus(),
            'warranty_period' => $object->getWarrantyPeriod(),
        ]);

        return $model;

    }


}