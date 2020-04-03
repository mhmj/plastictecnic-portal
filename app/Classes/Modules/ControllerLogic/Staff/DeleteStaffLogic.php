<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/4/2020
 * Time: 11:12 PM
 */

namespace App\Classes\Modules\ControllerLogic\Staff;


use App\Classes\Modules\Staff\Services\DeletesStaff;

class DeleteStaffLogic
{
    /** @var  DeletesStaff */
    private $DeletesStaff;

    /**
     * DeleteStaffLogic constructor.
     * @param DeletesStaff $DeletesStaff
     */
    public function __construct(DeletesStaff $DeletesStaff)
    {
        $this->DeletesStaff = $DeletesStaff;
    }

    public function execute(string $staffId)
    {
        return $this->DeletesStaff->execute($staffId);
    }
}