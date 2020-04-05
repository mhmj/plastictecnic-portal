<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30/3/2020
 * Time: 1:23 PM
 */

namespace App\Classes\Modules\ControllerLogic\ITAsset;


use App\Classes\Modules\ITAsset\DataTransferObject\ITAssetObject;
use App\Classes\Modules\ITAsset\Services\CreatesITAsset;
use Illuminate\Http\Request;

class CreateITAssetLogic
{

    /** @var  CreatesITAsset */
    private $CreatesITAsset;

    /**
     * CreateITAssetLogic constructor.
     * @param CreatesITAsset $CreatesITAsset
     */
    public function __construct(CreatesITAsset $CreatesITAsset)
    {
        $this->CreatesITAsset = $CreatesITAsset;
    }

    public function execute(Request $request)
    {
        $object = new ITAssetObject($request->asset_category_id,$request->company_id,$request->it_asset_brand_id,$request->model,$request->OS,$request->computer_name,$request->username,$request->office, $request->remark,$request->serial_no,$request->service_tag, $request->year_purchased, $request->warranty_status, $request->warranty_period,$request->status);
        return $this->CreatesITAsset->execute($object);
    }


}