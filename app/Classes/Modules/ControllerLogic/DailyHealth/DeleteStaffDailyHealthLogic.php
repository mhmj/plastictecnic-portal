<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/5/2020
 * Time: 9:50 AM
 */

namespace App\Classes\Modules\ControllerLogic\DailyHealth;


use App\Classes\Modules\DailyHealth\Services\DeletesStaffDailyHealth;

class DeleteStaffDailyHealthLogic
{
    /** @var  DeletesStaffDailyHealth */
    private $DeletesStaffDailyHealth;

    /**
     * DeleteStaffDailyHealthLogic constructor.
     * @param DeletesStaffDailyHealth $DeletesStaffDailyHealth
     */
    public function __construct(DeletesStaffDailyHealth $DeletesStaffDailyHealth)
    {
        $this->DeletesStaffDailyHealth = $DeletesStaffDailyHealth;
    }

    public function execute($id)
    {
        return $this->DeletesStaffDailyHealth->execute($id);
    }


}