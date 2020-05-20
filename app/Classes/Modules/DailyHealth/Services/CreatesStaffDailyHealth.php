<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19/5/2020
 * Time: 1:44 PM
 */

namespace App\Classes\Modules\DailyHealth\Services;


use App\StaffDailyHealth;
use Illuminate\Http\Request;

class CreatesStaffDailyHealth
{
    /** @var  StaffDailyHealth */
    private $repository;

    /**
     * CreatesStaffDailyHealth constructor.
     * @param StaffDailyHealth $repository
     */
    public function __construct(StaffDailyHealth $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Request $request)
    {
        $model = $this->repository->create([
            'staff_id' => $request->input('staff_id'),
            'staff_no'=> $request->input('staff_no'),
            'staff_name' => $request->input('staff_name'),
            'company_id' => $request->input('company_id'),
            'company_name' => $request->input('company_name'),
            'daily_starter_pack' => $request->input('daily_starter_pack'),
            'hand_sanitizing' => $request->input('hand_sanitizing'),
            'flu' => $request->input('flu'),
            'cough' => $request->input('cough'),
            'breathing_difficulty' => $request->input('breathing_difficulty'),
            'sore_throat' => $request->input('sore_throat'),
            'weak_in_limbs' => $request->input('weak_in_limbs'),
            'overall_health' => $request->input('overall_health'),
            'temperature' => $request->input('temperature'),
            'remark' => $request->input('remark'),
        ]);

        return $model;
    }


}