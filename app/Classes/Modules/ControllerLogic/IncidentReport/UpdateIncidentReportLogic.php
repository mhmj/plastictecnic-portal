<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/4/2020
 * Time: 1:56 PM
 */

namespace App\Classes\Modules\ControllerLogic\IncidentReport;


use App\Classes\Modules\IncidentReport\Services\UpdatesIncidentReport;
use Illuminate\Http\Request;

class UpdateIncidentReportLogic
{
    /** @var  UpdatesIncidentReport */
    private $UpdatesIncidentReport;

    /**
     * UpdateIncidentReportLogic constructor.
     * @param UpdatesIncidentReport $UpdatesIncidentReport
     */
    public function __construct(UpdatesIncidentReport $UpdatesIncidentReport)
    {
        $this->UpdatesIncidentReport = $UpdatesIncidentReport;
    }

    public function execute(int $id, Request $request)
    {
        return $this->UpdatesIncidentReport->execute($id, $request);
    }


}