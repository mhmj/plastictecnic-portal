<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:38 PM
 */

namespace App\Classes\Modules\ControllerLogic\Licensing;


use App\Classes\Modules\Licensing\Services\CreatesLicensing;
use Illuminate\Http\Request;

class CreateLicensingLogic
{
    /** @var CreatesLicensing  */
    private $CreatesLicensing;

    /**
     * CreateLicensingLogic constructor.
     * @param CreatesLicensing $CreatesLicensing
     */
    public function __construct(CreatesLicensing $CreatesLicensing)
    {
        $this->CreatesLicensing = $CreatesLicensing;
    }

    public function execute(Request $request)
    {
        return $this->CreatesLicensing->execute($request);
    }

}