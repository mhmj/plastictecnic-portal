<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6/5/2020
 * Time: 5:52 PM
 */

namespace App\Http\Controllers\ITAsset;


use App\ITAsset;

class ITAssetSummaryController
{
    /** @var  ITAsset */
    private $repository;

    /**
     * ITAssetSummaryController constructor.
     * @param \App\ITAsset $repository
     */
    public function __construct(ITAsset $repository)
    {
        $this->repository = $repository;
    }


    public function brands()
    {
        $array = [];
        $Dell = $this->repository->where('it_asset_brand_id','=',1)->get();
        $Lenovo = $this->repository->where('it_asset_brand_id','=',2)->get();
        $HP = $this->repository->where('it_asset_brand_id','=',3)->get();
        $Asus = $this->repository->where('it_asset_brand_id','=',4)->get();
        $Acer = $this->repository->where('it_asset_brand_id','=',5)->get();
        $LG = $this->repository->where('it_asset_brand_id','=',6)->get();
        $Synology = $this->repository->where('it_asset_brand_id','=',7)->get();
        $FortiGate = $this->repository->where('it_asset_brand_id','=',8)->get();

        $Dell = $Dell->count();
        $Lenovo = $Lenovo->count();
        $HP = $HP->count();
        $Asus = $Asus->count();
        $Acer = $Acer->count();
        $LG = $LG->count();
        $Synology = $Synology->count();
        $FortiGate = $FortiGate->count();

         array_push($array,$Dell,$Lenovo,$HP,$Asus,$Acer,$LG,$Synology,$FortiGate);

        return $array;
    }

    public function locations()
    {
        $array = [];
        $Bangi = $this->repository->where('company_id','=',1)->get();
        $NilaiA = $this->repository->where('company_id','=',2)->get();
        $NilaiB = $this->repository->where('company_id','=',3)->get();

        $Bangi = $Bangi->count();
        $NilaiA = $NilaiA->count();
        $NilaiB = $NilaiB->count();

        array_push($array,$Bangi,$NilaiA,$NilaiB);

        return $array;
    }

    public function received()
    {
        $array = [];
        $received = $this->repository->whereNotNull('staff_id')->get();
        $notreceived = $this->repository->whereNull('staff_id')->get();

        $received = $received->count();
        $notreceived = $notreceived->count();

        array_push($array,$received,$notreceived);

        return $array;
    }
}