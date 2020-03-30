<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30/3/2020
 * Time: 2:15 PM
 */

namespace App\Classes\Modules\ITAsset\DataTransferObject;


class ITAssetObject
{
    /** @var  int|null */
    private $asset_category_id;

    /** @var  int|null */
    private $company_id;

    /** @var  int|null */
    private $staff_id;

    /** @var  int|null */
    private $it_asset_brand_id;

    /** @var  strting|null */
    private $model;

    /** @var  string|null */
    private $serial_no;

    /** @var  string|null */
    private $service_tag;

    /** @var  string|null */
    private $year_purchased;

    /** @var  string|null */
    private $warranty_status;

    /** @var  string|null */
    private $warranty_period;

    /**
     * ITAssetObject constructor.
     * @param int|null $asset_category_id
     * @param int|null $company_id
     * @param int|null $staff_id
     * @param int|null $it_asset_brand_id
     * @param strting|null $model
     * @param null|string $serial_no
     * @param null|string $service_tag
     * @param null|string $year_purchased
     * @param null|string $warranty_status
     * @param null|string $warranty_period
     */
    public function __construct(?int $asset_category_id, ?int $company_id, ?int $staff_id, ?int $it_asset_brand_id, ?string $model, ?string $serial_no, ?string $service_tag, ?string $year_purchased, ?string $warranty_status, ?string $warranty_period)
    {
        $this->asset_category_id = $asset_category_id;
        $this->company_id = $company_id;
        $this->staff_id = $staff_id;
        $this->it_asset_brand_id = $it_asset_brand_id;
        $this->model = $model;
        $this->serial_no = $serial_no;
        $this->service_tag = $service_tag;
        $this->year_purchased = $year_purchased;
        $this->warranty_status = $warranty_status;
        $this->warranty_period = $warranty_period;
    }

    /**
     * @return int|null
     */
    public function getAssetCategoryId()
    {
        return $this->asset_category_id;
    }

    /**
     * @return int|null
     */
    public function getCompanyId()
    {
        return $this->company_id;
    }

    /**
     * @return int|null
     */
    public function getStaffId()
    {
        return $this->staff_id;
    }

    /**
     * @return int|null
     */
    public function getItAssetBrandId()
    {
        return $this->it_asset_brand_id;
    }

    /**
     * @return strting|null
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return null|string
     */
    public function getSerialNo()
    {
        return $this->serial_no;
    }

    /**
     * @return null|string
     */
    public function getServiceTag()
    {
        return $this->service_tag;
    }

    /**
     * @return null|string
     */
    public function getYearPurchased()
    {
        return $this->year_purchased;
    }

    /**
     * @return null|string
     */
    public function getWarrantyStatus()
    {
        return $this->warranty_status;
    }

    /**
     * @return null|string
     */
    public function getWarrantyPeriod()
    {
        return $this->warranty_period;
    }



}