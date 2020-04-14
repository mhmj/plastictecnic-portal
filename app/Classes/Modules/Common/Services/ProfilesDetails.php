<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/4/2020
 * Time: 9:10 PM
 */

namespace App\Classes\Modules\Common\Services;


use App\Staff;
use App\Http\Resources\Staff as StaffResources;
use Illuminate\Support\Facades\Hash;

class ProfilesDetails
{
    /** @var  Staff */
    private $repository;

    /**
     * ProfilesDetails constructor.
     * @param Staff $repository
     */
    public function __construct(Staff $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id)
    {
        $profile = $this->repository->findOrfail($id);

        return new StaffResources($profile);

    }

    public function changePassword($id,$new_password)
    {
        $profile = $this->repository->findOrFail($id);

        $profile->password = Hash::make($new_password);

        $profile->save();

        return new StaffResources($profile);

    }


}