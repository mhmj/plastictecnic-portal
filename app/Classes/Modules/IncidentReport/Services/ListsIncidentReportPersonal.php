<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24/6/2020
 * Time: 4:23 PM
 */

namespace App\Classes\Modules\IncidentReport\Services;


use App\IncidentReport;
use App\Http\Resources\IncidentReport as IncidentReportResources;


class ListsIncidentReportPersonal
{
    /** @var  IncidentReport */
    private $repository;

    /**
     * ListsIncidentReportPersonal constructor.
     * @param IncidentReport $repository
     */
    public function __construct(IncidentReport $repository)
    {
        $this->repository = $repository;
    }

    public function execute($location_id, $staff_id)
    {
        $IncidentReport = $this->repository->where("company_id", $location_id)
                                            ->where("handle_by", $staff_id)
                                            ->latest()->paginate(5);

        return IncidentReportResources::collection($IncidentReport);
    }


}