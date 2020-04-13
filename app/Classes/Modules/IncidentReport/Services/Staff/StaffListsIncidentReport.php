<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13/4/2020
 * Time: 7:59 PM
 */

namespace App\Classes\Modules\IncidentReport\Services\Staff;


use App\IncidentReport;
use App\Http\Resources\IncidentReport as IncidentReportResources;

class StaffListsIncidentReport
{
    /** @var  IncidentReport */
    private $repository;

    /**
     * StaffListsIncidentReport constructor.
     * @param IncidentReport $repository
     */
    public function __construct(IncidentReport $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        $incident_report = $this->repository->where('staff_id', $id)->latest()->paginate(5);

        return IncidentReportResources::collection($incident_report);
    }

}