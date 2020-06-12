<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/6/2020
 * Time: 4:53 PM
 */

namespace App\Classes\Modules\ControllerLogic\DailyHealth;


use App\Classes\Modules\DailyHealth\Services\ListsAllDailyHealth;

class ListAllDailyHealthLogic
{
    /** @var  ListsAllDailyHealth */
    private $ListsAllDailyHealth;

    /**
     * ListAllDailyHealthLogic constructor.
     * @param ListsAllDailyHealth $ListsAllDailyHealth
     */
    public function __construct(ListsAllDailyHealth $ListsAllDailyHealth)
    {
        $this->ListsAllDailyHealth = $ListsAllDailyHealth;
    }

    public function execute($companyId,$today)
    {
        return $this->ListsAllDailyHealth->execute($companyId,$today);
    }


}