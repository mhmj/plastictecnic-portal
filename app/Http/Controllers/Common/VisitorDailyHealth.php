<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/5/2020
 * Time: 10:44 AM
 */

namespace App\Http\Controllers\Common;


use App\VisitorDailyHealthBangi;
use App\VisitorDailyHealthNilaiA;
use App\VisitorDailyHealthNilaiB;
use Illuminate\Http\Request;
class VisitorDailyHealth
{
    /** @var  VisitorDailyHealthBangi */
    private $repository_bangi;

    /** @var  VisitorDailyHealthNilaiA */
    private $repository_nilaiA;

    /** @var  VisitorDailyHealthNilaiB */
    private $repository_nilaiB;

    /**
     * VisitorDailyHealth constructor.
     * @param VisitorDailyHealthBangi $repository_bangi
     * @param VisitorDailyHealthNilaiA $repository_nilaiA
     * @param VisitorDailyHealthNilaiB $repository_nilaiB
     */
    public function __construct(VisitorDailyHealthBangi $repository_bangi, VisitorDailyHealthNilaiA $repository_nilaiA, VisitorDailyHealthNilaiB $repository_nilaiB)
    {
        $this->repository_bangi = $repository_bangi;
        $this->repository_nilaiA = $repository_nilaiA;
        $this->repository_nilaiB = $repository_nilaiB;
    }


    public function create(Request $request)
    {

        $symptoms = implode(',', $request->input('symptoms'));
        $visited_country = implode(',', $request->input('visited_country'));

        if($request->input('company_id') == 1){


            $model = $this->repository_bangi->create([
                'company_id' => $request->input('company_id'),
                'company_name' => $request->input('company_name'),
                'name' => $request->input('name'),
                'mobile_no' => $request->input('mobile_no'),
                'NRIC_passport' => $request->input('NRIC_Passport'),
                'person_to_meet' => $request->input('person_to_meet'),
                'company_from_name' => $request->input('company_from_name'),
                'vehicle_no' => $request->input('vehicle_no'),
                'nationality' => $request->input('nationality'),
                'symptoms' => $symptoms,
                'symptoms_other' => $request->input('symptoms_other'),
                'contact_with' => $request->input('contact_with'),
                'is_visited_china' => $request->input('is_visited_china'),
                'visited_country' => $visited_country,
                'visited_other_country' => $request->input('visited_other_country'),
                'tabliqh' => $request->input('tabliqh'),
                'temperature' => $request->input('temperature'),
            ]);

            return $model;

        }

        if($request->input('company_id') == 2){

//            $symptoms = implode(',', $request->input('symptoms'));
//            $visited_country = implode(',', $request->input('visited_country'));

            $model = $this->repository_nilaiA->create([
                'company_id' => $request->input('company_id'),
                'company_name' => $request->input('company_name'),
                'name' => $request->input('name'),
                'mobile_no' => $request->input('mobile_no'),
                'NRIC_passport' => $request->input('NRIC_Passport'),
                'person_to_meet' => $request->input('person_to_meet'),
                'company_from_name' => $request->input('company_from_name'),
                'vehicle_no' => $request->input('vehicle_no'),
                'nationality' => $request->input('nationality'),
                'symptoms' => $symptoms,
                'symptoms_other' => $request->input('symptoms_other'),
                'contact_with' => $request->input('contact_with'),
                'is_visited_china' => $request->input('is_visited_china'),
                'visited_country' => $visited_country,
                'visited_other_country' => $request->input('visited_other_country'),
                'tabliqh' => $request->input('tabliqh'),
                'temperature' => $request->input('temperature'),
            ]);

            return $model;
        }

        if($request->input('company_id') == 3){

//            $symptoms = implode(',', $request->input('symptoms'));
//            $visited_country = implode(',', $request->input('visited_country'));

            $model = $this->repository_nilaiB->create([
                'company_id' => $request->input('company_id'),
                'company_name' => $request->input('company_name'),
                'name' => $request->input('name'),
                'mobile_no' => $request->input('mobile_no'),
                'NRIC_passport' => $request->input('NRIC_Passport'),
                'person_to_meet' => $request->input('person_to_meet'),
                'company_from_name' => $request->input('company_from_name'),
                'vehicle_no' => $request->input('vehicle_no'),
                'nationality' => $request->input('nationality'),
                'symptoms' => $symptoms,
                'symptoms_other' => $request->input('symptoms_other'),
                'contact_with' => $request->input('contact_with'),
                'is_visited_china' => $request->input('is_visited_china'),
                'visited_country' => $visited_country,
                'visited_other_country' => $request->input('visited_other_country'),
                'tabliqh' => $request->input('tabliqh'),
                'temperature' => $request->input('temperature'),
            ]);

            return $model;
        }


    }
    public function StaffCreate(Request $request)
    {
        $symptoms = implode(',', $request->input('symptoms'));
        $visited_country = implode(',', $request->input('visited_country'));

        if($request->input('company_id') == 1){

            $model = $this->repository_bangi->create([
                'company_id' => $request->input('company_id'),
                'company_name' => $request->input('company_name'),
                'name' => $request->input('name'),
                'mobile_no' => $request->input('mobile_no'),
                'NRIC_passport' => $request->input('NRIC_Passport'),
                'person_to_meet' => $request->input('person_to_meet'),
                'company_from_name' => $request->input('company_from_name'),
                'vehicle_no' => $request->input('vehicle_no'),
                'nationality' => $request->input('nationality'),
                'symptoms' => $symptoms,
                'symptoms_other' => $request->input('symptoms_other'),
                'contact_with' => $request->input('contact_with'),
                'is_visited_china' => $request->input('is_visited_china'),
                'visited_country' => $visited_country,
                'visited_other_country' => $request->input('visited_other_country'),
                'tabliqh' => $request->input('tabliqh'),
                'temperature' => $request->input('temperature'),
                'created_at' => $request->input('created_at'),
            ]);

            return $model;

        }

        if($request->input('company_id') == 2){

            $model = $this->repository_nilaiA->create([
                'company_id' => $request->input('company_id'),
                'company_name' => $request->input('company_name'),
                'name' => $request->input('name'),
                'mobile_no' => $request->input('mobile_no'),
                'NRIC_passport' => $request->input('NRIC_Passport'),
                'person_to_meet' => $request->input('person_to_meet'),
                'company_from_name' => $request->input('company_from_name'),
                'vehicle_no' => $request->input('vehicle_no'),
                'nationality' => $request->input('nationality'),
                'symptoms' => $symptoms,
                'symptoms_other' => $request->input('symptoms_other'),
                'contact_with' => $request->input('contact_with'),
                'is_visited_china' => $request->input('is_visited_china'),
                'visited_country' => $visited_country,
                'visited_other_country' => $request->input('visited_other_country'),
                'tabliqh' => $request->input('tabliqh'),
                'temperature' => $request->input('temperature'),
                'created_at' => $request->input('created_at'),
            ]);

            return $model;
        }

        if($request->input('company_id') == 3){

            $model = $this->repository_nilaiB->create([
                'company_id' => $request->input('company_id'),
                'company_name' => $request->input('company_name'),
                'name' => $request->input('name'),
                'mobile_no' => $request->input('mobile_no'),
                'NRIC_passport' => $request->input('NRIC_Passport'),
                'person_to_meet' => $request->input('person_to_meet'),
                'company_from_name' => $request->input('company_from_name'),
                'vehicle_no' => $request->input('vehicle_no'),
                'nationality' => $request->input('nationality'),
                'symptoms' => $symptoms,
                'symptoms_other' => $request->input('symptoms_other'),
                'contact_with' => $request->input('contact_with'),
                'is_visited_china' => $request->input('is_visited_china'),
                'visited_country' => $visited_country,
                'visited_other_country' => $request->input('visited_other_country'),
                'tabliqh' => $request->input('tabliqh'),
                'temperature' => $request->input('temperature'),
                'created_at' => $request->input('created_at'),
            ]);

            return $model;
        }
    }
    public function StaffDelete($company_id,$id){

        if($company_id == 1)
        {
            $model = $this->repository_bangi->findOrfail($id);
            if($model->delete()){
                return $model;
            }
        }
        if($company_id == 2)
        {
            $model = $this->repository_nilaiA->findOrfail($id);
            if($model->delete()){
                return $model;
            }
        }
        if($company_id == 3)
        {
            $model = $this->repository_nilaiB->findOrfail($id);
            if($model->delete()){
                return $model;
            }
        }
    }
}