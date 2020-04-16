<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:36 PM
 */

namespace App\Classes\Modules\Licensing\Services;


use App\Licensing;
use Illuminate\Http\Request;

class CreatesLicensing
{
    /** @var  Licensing */
    private $repository;

    /**
     * CreatesLicensing constructor.
     * @param Licensing $repository
     */
    public function __construct(Licensing $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Request $request)
    {
        $model = $this->repository->create([

            'it_asset_id' => $request->input('it_asset_id'),
            'company_id' => $request->input('company_id'),
            'license_name'=> $request->input('license_name'),
            'license_no' => $request->input('license_no'),
            'vendor' => $request->input('vendor'),
            'serial_key' => $request->input('serial_key'),
            'version' => $request->input('version'),
            'quantity' => $request->input('quantity'),
            'remark' => $request->input('remark'),
            'date_purchased' => $request->input('date_purchased'),
            'date_expired' => $request->input('date_expired'),
        ]);

        return $model;
    }

}