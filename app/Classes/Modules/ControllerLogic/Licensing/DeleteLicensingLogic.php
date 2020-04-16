<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:39 PM
 */

namespace App\Classes\Modules\ControllerLogic\Licensing;


use App\Classes\Modules\Licensing\Services\DeletesLicensing;

class DeleteLicensingLogic
{
    /** @var  DeletesLicensing */
    private $DeletesLicensing;

    /**
     * DeleteLicensingLogic constructor.
     * @param DeletesLicensing $DeletesLicensing
     */
    public function __construct(DeletesLicensing $DeletesLicensing)
    {
        $this->DeletesLicensing = $DeletesLicensing;
    }

    public function execute($id)
    {
        return $this->DeletesLicensing->execute($id);
    }


}