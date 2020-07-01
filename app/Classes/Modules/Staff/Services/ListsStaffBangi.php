<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/4/2020
 * Time: 8:20 PM
 */

namespace App\Classes\Modules\Staff\Services;


use App\Staff;
use App\Http\Resources\Staff as StaffResources;

class ListsStaffBangi
{
    /** @var  Staff */
    private $repository;

    /**
     * ListsStaffBangi constructor.
     * @param Staff $repository
     */
    public function __construct(Staff $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        $staff = $this->repository->where('company_id', $id)->latest()->paginate(10);
        return StaffResources::collection($staff);
    }


}