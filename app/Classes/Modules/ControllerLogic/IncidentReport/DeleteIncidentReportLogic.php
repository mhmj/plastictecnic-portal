<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/4/2020
 * Time: 1:57 PM
 */

namespace App\Classes\Modules\ControllerLogic\IncidentReport;


use App\Classes\Modules\IncidentReport\Services\DeletesIncidentReport;

class DeleteIncidentReportLogic
{
    /** @var  DeletesIncidentReport */
    private $DeletesIncidentReport;

    /**
     * DeleteIncidentReportLogic constructor.
     * @param DeletesIncidentReport $DeletesIncidentReport
     */
    public function __construct(DeletesIncidentReport $DeletesIncidentReport)
    {
        $this->DeletesIncidentReport = $DeletesIncidentReport;
    }

    public function execute(int $id)
    {
        return $this->DeletesIncidentReport->execute($id);
    }


}