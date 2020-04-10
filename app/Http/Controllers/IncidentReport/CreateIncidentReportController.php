<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/4/2020
 * Time: 2:36 PM
 */

namespace App\Http\Controllers\IncidentReport;


use App\Classes\Modules\ControllerLogic\IncidentReport\CreateIncidentReportLogic;
use Illuminate\Http\Request;

class CreateIncidentReportController
{
    public function create(Request $request, CreateIncidentReportLogic $logic)
    {
        return $logic->execute($request);
    }
}
