<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\ITAsset as ITAssetModel;
use App\Company as CompanyModel;

class Licensing extends JsonResource
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
            'it_asset_id' => new ITAsset(ITAssetModel::find($this->it_asset_id)),
            'company_id' => CompanyModel::where('id', $this->company_id)->first(),
            'license_name'=> $this->license_name,
            'license_no' => $this->license_no,
            'vendor' => $this->vendor,
            'serial_key' => $this->serial_key,
            'version' => $this->version,
            'quantity' => $this->quantity,
            'remark' => $this->remark,
            'date_purchased' => $this->date_purchased,
            'date_expired' => $this->date_expired,
        ];
    }
}
