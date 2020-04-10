<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\ITAsset as ITAssetModel;
use App\Http\Resources\ITAsset as ITResources;
use App\Staff as StaffModel;
use App\Company as CompanyModel;
use App\Http\Resources\Staff as StaffResources;

class IncidentReport extends JsonResource
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
            'asset_id' => new ITAsset(ITAssetModel::find($this->asset_id)),
            'staff_id' => new Staff(StaffModel::find($this->staff_id)),
            //'staff_id' => new Staff(StaffModel::where('id', $this->staff_id)->first()),
            'handle_by' => new Staff(StaffModel::find($this->handle_by)),
            'confirm_by' => StaffModel::where('id', $this->confirm_by)->first(),
            'company_id' => CompanyModel::where('id', $this->company_id)->first(),
            'root_cause' => $this->root_cause,
            'incident_category' => $this->incident_category,
            'job_start' => $this->job_start,
            'job_finish' => $this->job_finish,
            'description' => $this->description,
            'image' => $this->image,
            'rate' => $this->rate,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
