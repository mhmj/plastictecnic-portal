<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:36 PM
 */

namespace App\Classes\Modules\Licensing\Services;


use App\Licensing;
use App\Http\Resources\Licensing as LicensingResources;
use Illuminate\Http\Request;

class UpdatesLicensing
{
    /** @var  Licensing */
    private $repository;

    /**
     * UpdatesLicensing constructor.
     * @param Licensing $repository
     */
    public function __construct(Licensing $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id, Request $request)
    {
        $license = $this->repository->findOrFail($id);

        $license->it_asset_id = $request->input('it_asset_id');
        $license->company_id = $request->input('company_id');
        $license->license_name = $request->input('license_name');
        $license->license_no = $request->input('license_no');
        $license->vendor = $request->input('vendor');
        $license->serial_key = $request->input('serial_key');
        $license->version = $request->input('version');
        $license->quantity = $request->input('quantity');
        $license->remark = $request->input('remark');
        $license->date_purchased = $request->input('date_purchased');
        $license->date_expired = $request->input('date_expired');

        if($license->save()){
            return new LicensingResources($license);
        }

    }


}