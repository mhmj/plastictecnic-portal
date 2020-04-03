<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/4/2020
 * Time: 11:11 PM
 */

namespace App\Classes\Modules\ControllerLogic\Staff;


use App\Classes\Modules\Staff\DataTransferObject\StaffObject;
use App\Classes\Modules\Staff\Services\UpdatesStaff;
use Illuminate\Http\Request;

class UpdateStaffLogic
{
    /** @var  UpdatesStaff */
    private $UpdatesStaff;

    /**
     * UpdateStaffLogic constructor.
     * @param UpdatesStaff $UpdatesStaff
     */
    public function __construct(UpdatesStaff $UpdatesStaff)
    {
        $this->UpdatesStaff = $UpdatesStaff;
    }

    public function execute(string $staffId, Request $request)
    {
        $object = new StaffObject($request->company_id, $request->department_id, $request->designation_id, $request->staff_no, $request->email, $request->username, $request->full_name, $request->telephone_no, $request->phone_no);

        return $this->UpdatesStaff->execute($staffId, $object);
    }
}