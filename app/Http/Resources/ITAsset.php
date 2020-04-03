<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\AssetCategory as AssetCategoryModel;
use App\ITAssetBrand as ITAssetBrandModel;
use App\Company as CompanyModel;
use App\Staff as StaffModel;

class ITAsset extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'asset_category_id' => AssetCategoryModel::where('id', $this->asset_category_id)->first(),
            'company' => CompanyModel::where('id', $this->company_id)->first(),
            'staff_id' => StaffModel::where('id', $this->staff_id)->first(),
            'it_asset_brand_id' => ITAssetBrandModel::where('id', $this->it_asset_brand_id)->first(),
            'it_asset_no' => $this->it_asset_no,
            'model' => $this->model,
            'serial_no' => $this->serial_no,
            'service_tag' => $this->service_tag,
            'year_purchased' => $this->year_purchased,
            'warranty_status' => $this->warranty_status,
            'warranty_period' => $this->warranty_period,

        ];
    }
}
