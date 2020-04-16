<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:37 PM
 */

namespace App\Classes\Modules\Licensing\Services;


use App\Licensing;
use App\Http\Resources\Licensing as LicensingResources;

class DeletesLicensing
{
    /** @var  Licensing */
    private $repository;

    /**
     * DeletesLicensing constructor.
     * @param Licensing $repository
     */
    public function __construct(Licensing $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id)
    {
        $license = $this->repository->findOrFail($id);

        if($license->delete()){

            return new LicensingResources($license);
        }
    }

}