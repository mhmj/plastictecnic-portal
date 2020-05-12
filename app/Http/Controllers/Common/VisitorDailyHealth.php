<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/5/2020
 * Time: 10:44 AM
 */

namespace App\Http\Controllers\Common;


use Illuminate\Http\Request;
use App\VisitorDailyHealth as VisitorDailyHealthModel;
class VisitorDailyHealth
{
    /** @var  VisitorDailyHealthModel */
    private $repository;

    /**
     * VisitorDailyHealth constructor.
     * @param VisitorDailyHealthModel $repository
     */
    public function __construct(VisitorDailyHealthModel $repository)
    {
        $this->repository = $repository;
    }

    public function create(Request $request)
    {
        $symptoms = implode(',', $request->input('symptoms'));
        $visited_country = implode(',', $request->input('visited_country'));

        $model = $this->repository->create([
            'name' => $request->input('name'),
            'mobile_no' => $request->input('mobile_no'),
            'NRIC_passport' => $request->input('NRIC_Passport'),
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