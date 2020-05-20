<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffDailyHealth extends JsonResource
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
            'staff_id' => $this->staff_id,
            'staff_no' => $this->staff_no,
            'staff_name' => $this->staff_name,
            'company_id' => $this->company_id,
            'company_name' => $this->company_name,
            'daily_starter_pack' => $this->daily_starter_pack,
            'hand_sanitizing' => $this->hand_sanitizing,
            'flu' => $this->flu,
            'cough' => $this->cough,
            'breathing_difficulty' => $this->breathing_difficulty,
            'sore_throat' => $this->sore_throat,
            'weak_in_limbs' => $this->weak_in_limbs,
            'overall_health' => $this->overall_health,
            'temperature' => $this->temperature,
            //'remark' => $this->remark,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}
