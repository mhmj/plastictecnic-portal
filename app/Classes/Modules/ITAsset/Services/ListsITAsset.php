<?php

namespace App\Classes\Modules\ITAsset\Services;

use App\ITAsset;
use App\Http\Resources\ITAsset as ITAssetResources;


class ListsITAsset
{
    /** @var  ITAsset */
    private $resporitory;

    /**
     * ListsITAsset constructor.
     * @param ITAsset $resporitory
     */
    public function __construct(ITAsset $resporitory)
    {
        $this->resporitory = $resporitory;
    }

    public function execute(){

        $IT_asset = $this->resporitory->paginate(5);

        return ITAssetResources::collection($IT_asset);
    }


}