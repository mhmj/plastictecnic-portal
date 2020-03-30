<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30/3/2020
 * Time: 1:20 PM
 */

namespace App\Classes\Modules\ITAsset\Services;


use App\ITAsset;
use Illuminate\Http\Request;
use App\Http\Resources\ITAsset as ITAssetResources;

class AssignITAsset
{
    /** @var  ITAsset */
    private $repository;

    /**
     * AssignITAsset constructor.
     * @param ITAsset $repository
     */
    public function __construct(ITAsset $repository)
    {
        $this->repository = $repository;
    }

    public function execute(String $ITAssetID, Request $request)
    {
        $ITAsset = $this->repository->findOrFail($ITAssetID);

        $ITAsset->staff_id = $request->staff_id;

        if($ITAsset->save()){
            return new ITAssetResources($ITAsset);
        }

    }

}