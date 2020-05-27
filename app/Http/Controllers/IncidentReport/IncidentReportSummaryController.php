<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7/5/2020
 * Time: 5:31 PM
 */

namespace App\Http\Controllers\IncidentReport;


use App\IncidentReport;

class IncidentReportSummaryController
{
    /** @var  IncidentReport */
    private $repository;

    /**
     * IncidentReportSummaryController constructor.
     * @param IncidentReport $repository
     */
    public function __construct(IncidentReport $repository)
    {
        $this->repository = $repository;
    }

    public function status()
    {
        $array = [];
        $Received = $this->repository->where('status','=', 'Received')->get();
        $Pending_1 = $this->repository->where('status','=','Pending 1')->get();
        $Pending_2 = $this->repository->where('status','=', 'Pending 2')->get();
        $KIV = $this->repository->where('status','=', 'KIV')->get();
        $Closed = $this->repository->where('status','=', 'Closed')->get();

        $Received = $Received->count();
        $Pending_1 = $Pending_1->count();
        $Pending_2 = $Pending_2->count();
        $KIV = $KIV->count();
        $Closed = $Closed->count();

        array_push($array,$Received,$Pending_1,$Pending_2,$KIV,$Closed);

        return $array;
    }

    public function root_cause()
    {
        $array = [];
        $root_cause_1 = $this->repository->where('root_cause','=', 'SW/HW/DB Configuration')->get();
        $root_cause_2 = $this->repository->where('root_cause','=','SW/HW/DB Bug')->get();
        $root_cause_3 = $this->repository->where('root_cause','=','HW Failure')->get();
        $root_cause_4 = $this->repository->where('root_cause','=', 'User Negligence')->get();

        $root_cause_1 = $root_cause_1->count();
        $root_cause_2 = $root_cause_2->count();
        $root_cause_3 = $root_cause_3->count();
        $root_cause_4 = $root_cause_4->count();

        array_push($array,$root_cause_1,$root_cause_2,$root_cause_3,$root_cause_4);

        return $array;
    }

    public function location()
    {
        $array = [];
        $Bangi = $this->repository->where('company_id','=', 1)->get();
        $NilaiA = $this->repository->where('company_id','=',2)->get();
        $NilaiB = $this->repository->where('company_id','=', 3)->get();

        $Bangi = $Bangi->count();
        $NilaiA = $NilaiA->count();
        $NilaiB = $NilaiB->count();

        array_push($array,$Bangi,$NilaiA,$NilaiB);

        return $array;
    }

    public function handle_by()
    {
        $array = [];
        $Amar = $this->repository->where('handle_by','=', 10)->get();
        $Kelvin = $this->repository->where('handle_by','=',16)->get();
        $Hazim = $this->repository->where('handle_by','=', 1)->get();
        $Hilmi = $this->repository->where('handle_by','=', 132)->get();

        $Amar = $Amar->count();
        $Kelvin = $Kelvin->count();
        $Hazim = $Hazim->count();
        $Hilmi = $Hilmi->count();

        array_push($array,$Amar,$Kelvin,$Hazim,$Hilmi);

        return $array;
    }


}