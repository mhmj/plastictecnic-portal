<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/4/2020
 * Time: 1:55 PM
 */

namespace App\Classes\Modules\ControllerLogic\IncidentReport;


use App\Classes\Modules\IncidentReport\Services\CreatesIncidentReport;
use Illuminate\Http\Request;

class CreateIncidentReportLogic
{
    /** @var  CreatesIncidentReport */
    private $CreatesIncidentReport;

    /**
     * CreateIncidentReportLogic constructor.
     * @param CreatesIncidentReport $CreatesIncidentReport
     */
    public function __construct(CreatesIncidentReport $CreatesIncidentReport)
    {
        $this->CreatesIncidentReport = $CreatesIncidentReport;
    }

    public function execute(Request $request)
    {
        return $this->CreatesIncidentReport->execute($request);
    }


}