<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/4/2020
 * Time: 5:54 PM
 */

namespace App\Classes\Modules\Staff\Services;


use App\Staff;
use App\Http\Resources\Staff as StaffResources;

class SearchesStaff
{
    /** @var  Staff */
    private $repository;

    /**
     * SearchesStaff constructor.
     * @param Staff $repository
     */
    public function __construct(Staff $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id, $query)
    {
        $result = $this->repository->where('company_id',$id)
            ->where('staff_no', 'LIKE', "%".$query."%")
            ->orWhere('full_name', 'LIKE', "%".$query."%")
            ->latest()
            ->paginate(5);

        return StaffResources::collection($result);
    }

}