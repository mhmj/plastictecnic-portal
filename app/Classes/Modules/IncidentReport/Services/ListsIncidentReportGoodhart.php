<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/5/2020
 * Time: 11:46 AM
 */

namespace App\Classes\Modules\IncidentReport\Services;

use App\IncidentReport;
use App\Http\Resources\IncidentReport as IncidentReportResources;

class ListsIncidentReportGoodhart
{
    /** @var  IncidentReport */
    private $repository;

    /**
     * ListsIncidentReportBangi constructor.
     * @param IncidentReport $repository
     */
    public function __construct(IncidentReport $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        $incident_report = $this->repository->where('company_id', $id)->latest()->paginate(5);
        return IncidentReportResources::collection($incident_report);
    }
}