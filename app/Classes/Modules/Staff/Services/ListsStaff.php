<?php


namespace App\Classes\Modules\Staff\Services;

use App\Http\Resources\Staff as StaffResources;
use App\Staff;

class ListsStaff
{
    /** @var  Staff */
    private $resporitory;

    /**
     * ListsStaff constructor.
     * @param Staff $resporitory
     */
    public function __construct(Staff $resporitory)
    {
        $this->resporitory = $resporitory;
    }

    public function execute(){

        $staff = $this->resporitory->paginate(5);

        return StaffResources::collection($staff);
    }
}