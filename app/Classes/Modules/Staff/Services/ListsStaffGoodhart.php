<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 8/4/2020
 * Time: 10:42 PM
 */

namespace App\Classes\Modules\Staff\Services;


use App\Staff;
use App\Http\Resources\Staff as StaffResources;

class ListsStaffGoodhart
{
    /** @var  Staff */
    private $repository;

    /**
     * ListsStaffGoodhart constructor.
     * @param Staff $repository
     */
    public function __construct(Staff $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        $staff = $this->repository->where('company_id', $id)->latest()->paginate(5);
        return StaffResources::collection($staff);
    }


}