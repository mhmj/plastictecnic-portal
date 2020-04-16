<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:35 PM
 */

namespace App\Classes\Modules\Licensing\Services;

use App\Licensing;
use App\Http\Resources\Licensing as LicensingResources;

class ListsLicensingNilaiA
{
    /** @var  Licensing */
    private $repository;

    /**
     * ListsLicensingBangi constructor.
     * @param Licensing $repository
     */
    public function __construct(Licensing $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id)
    {
        $license = $this->repository->where('company_id', $id)->latest()->paginate(5);
        return LicensingResources::collection($license);
    }
}