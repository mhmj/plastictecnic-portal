<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30/3/2020
 * Time: 1:25 PM
 */

namespace App\Classes\Modules\ControllerLogic\ITAsset;


use App\Classes\Modules\ITAsset\Services\AssignITAsset;
use Illuminate\Http\Request;

class AssignITAssetLogic
{
    /** @var  AssignITAsset */
    private $AssignITAsset;

    /**
     * AssignITAssetLogic constructor.
     * @param AssignITAsset $AssignITAsset
     */
    public function __construct(AssignITAsset $AssignITAsset)
    {
        $this->AssignITAsset = $AssignITAsset;
    }

    public function execute(String $ITAssetID, Request $request){

        return $this->AssignITAsset->execute($ITAssetID,$request);
    }


}