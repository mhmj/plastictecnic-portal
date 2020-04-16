<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:39 PM
 */

namespace App\Classes\Modules\ControllerLogic\Licensing;


use App\Classes\Modules\Licensing\Services\UpdatesLicensing;
use Illuminate\Http\Request;

class UpdateLicensingLogic
{
    /** @var  UpdatesLicensing */
    private $UpdatesLicensing;

    /**
     * UpdateLicensingLogic constructor.
     * @param UpdatesLicensing $UpdatesLicensing
     */
    public function __construct(UpdatesLicensing $UpdatesLicensing)
    {
        $this->UpdatesLicensing = $UpdatesLicensing;
    }

    public function execute($id, Request $request)
    {
        return $this->UpdatesLicensing->execute($id, $request);
    }


}