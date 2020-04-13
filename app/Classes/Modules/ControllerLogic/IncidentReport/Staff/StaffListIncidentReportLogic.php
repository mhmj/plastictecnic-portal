<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13/4/2020
 * Time: 7:57 PM
 */

namespace App\Classes\Modules\ControllerLogic\IncidentReport\Staff;


use App\Classes\Modules\IncidentReport\Services\Staff\StaffListsIncidentReport;

class StaffListIncidentReportLogic
{

    /** @var  StaffListsIncidentReport */
    private $StaffListsIncidentReport;

    /**
     * StaffListIncidentReportLogic constructor.
     * @param StaffListsIncidentReport $StaffListsIncidentReport
     */
    public function __construct(StaffListsIncidentReport $StaffListsIncidentReport)
    {
        $this->StaffListsIncidentReport = $StaffListsIncidentReport;
    }

    public function execute(int $id)
    {
        return $this->StaffListsIncidentReport->execute($id);
    }


}