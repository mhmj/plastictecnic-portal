<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/4/2020
 * Time: 1:44 PM
 */

namespace App\Classes\Modules\IncidentReport\Services;


use App\IncidentReport;
use App\Http\Resources\IncidentReport as IncidentReportResources;

class DeletesIncidentReport
{
    /** @var  IncidentReport */
    private $repository;

    /**
     * DeletesIncidentReport constructor.
     * @param IncidentReport $repository
     */
    public function __construct(IncidentReport $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        $incident_report = $this->repository->findOrFail($id);

        if($incident_report->delete()){

            return new IncidentReportResources($incident_report);
        }
    }


}