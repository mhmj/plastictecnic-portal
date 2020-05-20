<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class VisitorDailyHealth extends JsonResource
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
            'company_id' => $this->company_id,
            'company_name' => $this->company_name,
            'name' => $this->name,
            'NRIC_passport' => $this->NRIC_passport,
            'person_to_meet' => $this->person_to_meet,
            'company_from_name' => $this->company_from_name,
            'vehicle_no' => $this->vehicle_no,
            'mobile_no' => $this->mobile_no,
            'nationality' => $this->nationality,
            'symptoms' => $this->symptoms,
            'symptoms_other' => $this->symptoms_other,
            'contact_with' => $this->contact_with,
            'is_visited_china' => $this->is_visited_china,
            'visited_country' => $this->visited_country,
            'visited_other_country' => $this->visited_other_country,
            'tabliqh' => $this->tabliqh,
            'temperature' => $this->temperature,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
