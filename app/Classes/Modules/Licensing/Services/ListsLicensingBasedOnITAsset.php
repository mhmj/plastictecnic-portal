<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 8/5/2020
 * Time: 2:13 PM
 */

namespace App\Classes\Modules\Licensing\Services;


use App\Licensing;
use App\Http\Resources\Licensing as LicensingResources;

class ListsLicensingBasedOnITAsset
{
    /** @var  Licensing */
    private $repository;

    /**
     * ListsLicensingBasedOnITAsset constructor.
     * @param Licensing $repository
     */
    public function __construct(Licensing $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id)
    {
        $license = $this->repository->where('it_asset_id','=', $id)->paginate(5);
        return LicensingResources::collection($license);
    }


}