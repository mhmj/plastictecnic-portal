<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15/6/2020
 * Time: 2:08 PM
 */

namespace App\Classes\Modules\ControllerLogic\DailyHealth;


use App\Classes\Modules\DailyHealth\Services\ListsAllNotDoneDailyHealth;

class ListAllNotDoneDailyHealthLogic
{

    /** @var  ListsAllNotDoneDailyHealth */
    private $ListAllNotDoneDailyHealth;

    /**
     * ListAllNotDoneDailyHealthLogic constructor.
     * @param ListsAllNotDoneDailyHealth $ListAllNotDoneDailyHealth
     */
    public function __construct(ListsAllNotDoneDailyHealth $ListAllNotDoneDailyHealth)
    {
        $this->ListAllNotDoneDailyHealth = $ListAllNotDoneDailyHealth;
    }

    public function execute($companyId, $date)
    {
        return $this->ListAllNotDoneDailyHealth->execute($companyId,$date);
    }


}