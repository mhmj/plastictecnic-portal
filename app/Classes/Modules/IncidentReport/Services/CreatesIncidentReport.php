<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/4/2020
 * Time: 1:43 PM
 */

namespace App\Classes\Modules\IncidentReport\Services;


use App\IncidentReport;
use Illuminate\Http\Request;

class CreatesIncidentReport
{
    /** @var  IncidentReport */
    private $repository;

    /**
     * CreatesIncidentReport constructor.
     * @param IncidentReport $repository
     */
    public function __construct(IncidentReport $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Request $request)
    {

//        $fileName = time().'.'.$request->file->getClientOriginalExtension();
//        $request->file->storeAs('public/IncidentReport', $fileName);

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
            $fileNameToStore = '';
        }
        $ticket_no = date("Ymd").rand(1, 999999);
        $model = $this->repository->create([
            'ticket_no' => $ticket_no,
            'asset_id' => $request->input('asset_id'),
            'staff_id' => $request->input('staff_id'),
            'handle_by' => $request->input('handle_by'),
            'confirm_by' => $request->input('confirm_by'),
            'company_id' => $request->input('company_id'),
            'root_cause' => $request->input('root_cause'),
            'incident_category' => $request->input('incident_category'),
            'job_start' => $request->input('job_start'),
            'job_finish' => $request->input('job_finish'),
            'description' => $request->input('description'),
            'image' => $fileNameToStore,
            'rate' => $request->input('rate'),
            'solution' => $request->input('solution'),
            'remark' => $request->input('remark'),
            'status' => $request->input('status'),
        ]);

        return $model;
    }
}