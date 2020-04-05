<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/4/2020
 * Time: 3:55 AM
 */

namespace App\Classes\Modules\ITAsset\Services;

use App\ITAsset;
use App\Http\Resources\ITAsset as ITResources;

class ListsITAssetNilaiA
{
    /** @var ITAsset */
    private $repository;

    /**
     * ListsITAssetBangi constructor.
     * @param ITAsset $repository
     */
    public function __construct(ITAsset $repository)
    {
        $this->repository = $repository;
    }


    public function execute(int $id){

        $ITAsset = $this->repository->where('company_id', $id)->latest()->paginate(5);
        return ITResources::collection($ITAsset);

    }
}