<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:41 PM
 */

namespace App\Classes\Modules\Licensing\Services;


use App\Licensing;
use App\Http\Resources\Licensing as LicensingResources;

class SearchesLicensing
{
    /** @var  Licensing */
    private $repository;

    /**
     * SearchesLicensing constructor.
     * @param Licensing $repository
     */
    public function __construct(Licensing $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id, $query)
    {
        $result = $this->repository->where('company_id',$id)
            ->where('license_no', 'LIKE', "%".$query."%")
            ->orWhere('license_name', 'LIKE', "%".$query."%")
            ->orWhere('vendor', 'LIKE', "%".$query."%")
            ->latest()
            ->paginate(5);

        return LicensingResources::collection($result);
    }


}