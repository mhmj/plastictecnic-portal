<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/4/2020
 * Time: 11:11 PM
 */

namespace App\Classes\Modules\ControllerLogic\Staff;


use App\Classes\Modules\Staff\DataTransferObject\StaffObject;
use App\Classes\Modules\Staff\Services\CreatesStaff;
use Illuminate\Http\Request;

class CreateStaffLogic
{
    /** @var  CreatesStaff */
    private $CreatesStaff;

    /**
     * CreateStaffLogic constructor.
     * @param CreatesStaff $CreatesStaff
     */
    public function __construct(CreatesStaff $CreatesStaff)
    {
        $this->CreatesStaff = $CreatesStaff;
    }


    public function execute(Request $request)
    {
        $staff = new StaffObject($request->company_id, $request->department_id, $request->designation_id, $request->staff_no, $request->email, $request->username, $request->full_name, $request->telephone_no, $request->phone_no);

        return $this->CreatesStaff->execute($staff);
    }
}