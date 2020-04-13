<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13/4/2020
 * Time: 6:19 PM
 */

namespace App\Classes\Modules\ITAsset\Services\Staff;


use App\ITAsset;
use App\Http\Resources\ITAsset as ITAssetResources;

class StaffListsITAsset
{
    /** @var  ITAsset */
    private $repository;

    /**
     * StaffListsITAsset constructor.
     * @param ITAsset $repository
     */
    public function __construct(ITAsset $repository)
    {
        $this->repository = $repository;
    }

    public function excute(int $id)
    {
        $ITAsset = $this->repository->where('staff_id', $id)->latest()->paginate(5);

        return ITAssetResources::collection($ITAsset);
    }

}