<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19/5/2020
 * Time: 2:46 PM
 */

namespace App\Classes\Modules\ControllerLogic\DailyHealth;


use App\Classes\Modules\DailyHealth\Services\ListsPersonalDailyHealth;

class ListPersonalDailyHealthLogic
{
    /** @var  ListsPersonalDailyHealth */
    private $ListsPersonalDailyHealth;

    /**
     * ListPersonalDailyHealthLogic constructor.
     * @param ListsPersonalDailyHealth $ListsPersonalDailyHealth
     */
    public function __construct(ListsPersonalDailyHealth $ListsPersonalDailyHealth)
    {
        $this->ListsPersonalDailyHealth = $ListsPersonalDailyHealth;
    }

    public function execute($companyId, $staffId)
    {
        return $this->ListsPersonalDailyHealth->execute($companyId, $staffId);
    }

}