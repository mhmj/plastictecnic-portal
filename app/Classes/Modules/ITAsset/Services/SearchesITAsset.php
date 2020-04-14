<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/4/2020
 * Time: 2:11 PM
 */

namespace App\Classes\Modules\ITAsset\Services;


use App\ITAsset;
use App\Http\Resources\ITAsset as ITAssetResources;
use Illuminate\Http\Request;

class SearchesITAsset
{
    /** @var  ITAsset */
    private $repository;

    /**
     * SearchesITAsset constructor.
     * @param ITAsset $repository
     */
    public function __construct(ITAsset $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id, $query)
    {
        $result = $this->repository->where('company_id',$id)
                                        ->where('computer_name', 'LIKE', "%".$query."%")
                                        ->orWhere('serial_no', 'LIKE', "%".$query."%")
                                        ->latest()
                                        ->paginate(5);

        return ITAssetResources::collection($result);
    }


}