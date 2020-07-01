<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24/6/2020
 * Time: 4:22 PM
 */

namespace App\Classes\Modules\ControllerLogic\IncidentReport;


use App\Classes\Modules\IncidentReport\Services\ListsIncidentReportPersonal;

class ListIncidentReportPersonalLogic
{
    /** @var  ListsIncidentReportPersonal */
    private $ListsIncidentReportPersonal;

    /**
     * ListIncidentReportPersonalLogic constructor.
     * @param ListsIncidentReportPersonal $ListsIncidentReportPersonal
     */
    public function __construct(ListsIncidentReportPersonal $ListsIncidentReportPersonal)
    {
        $this->ListsIncidentReportPersonal = $ListsIncidentReportPersonal;
    }

    public function execute($location_id, $staff_id)
    {
        return $this->ListsIncidentReportPersonal->execute($location_id, $staff_id);
    }


}