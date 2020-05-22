<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/5/2020
 * Time: 11:08 AM
 */

namespace App\Classes\Modules\ITAsset\Services\Staff;

use App\ITAsset;
use App\Http\Resources\ITAsset as ITResources;

class ListsITAssetGoodhart
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

    public function execute($id){

        $ITAsset = $this->repository->where('company_id', $id)->latest()->paginate(5);
        return ITResources::collection($ITAsset);

    }
}