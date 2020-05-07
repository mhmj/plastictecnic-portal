<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/4/2020
 * Time: 1:43 PM
 */

namespace App\Classes\Modules\IncidentReport\Services;


use App\IncidentReport;
use App\Http\Resources\IncidentReport as IncidentReportResources;
use Illuminate\Http\Request;
use App\Notifications\IncidentReportReceived;
use App\Notifications\IncidentReportITReceived;
use App\Staff;
use Illuminate\Support\Facades\Notification;

class UpdatesIncidentReport
{
    /** @var  IncidentReport */
    private $repository;

    /**
     * UpdatesIncidentReport constructor.
     * @param IncidentReport $repository
     */
    public function __construct(IncidentReport $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, Request $request)
    {
        if($request->hasFile('file')){
            // Get filename with the extension
            $filenameWithExt = $request->file->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file->storeAs('public/IncidentReport', $fileNameToStore);
        } else {
            $fileNameToStore = $request->file;
        }


        $incident_report = $this->repository->findOrFail($id);
        $incident_report->asset_id = $request->input('asset_id');
        $incident_report->staff_id = $request->input('staff_id');
        $incident_report->handle_by = $request->input('handle_by');
        $incident_report->confirm_by = $request->input('confirm_by');
        $incident_report->company_id = $request->input('company_id');
        $incident_report->root_cause = $request->input('root_cause');
        $incident_report->incident_category = $request->input('incident_category');
        $incident_report->job_start = $request->input('job_start');
        $incident_report->job_finish = $request->input('job_finish');
        $incident_report->description = $request->input('description');
        $incident_report->image =$fileNameToStore;
        $incident_report->rate = $request->input('rate');
        $incident_report->status = $request->input('status');
        $incident_report->solution = $request->input('solution');

        $staff = Staff::where('id', $request->input('staff_id'))->get();
        $ITStaff = Staff::where('id', $request->input('handle_by'))->get();

        if($request->input('status') ==='Received')
        {
            Notification::send($staff, new IncidentReportReceived($incident_report));
            Notification::send($ITStaff, new IncidentReportITReceived($incident_report));
        }

        if($incident_report->save()){
            return new IncidentReportResources($incident_report);
        }
    }

}