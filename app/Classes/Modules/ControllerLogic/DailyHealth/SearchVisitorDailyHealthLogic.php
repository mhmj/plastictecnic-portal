<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13/5/2020
 * Time: 4:18 PM
 */

namespace App\Classes\Modules\ControllerLogic\DailyHealth;


use App\Classes\Modules\DailyHealth\Services\SearchesVisitorDailyHealth;

class SearchVisitorDailyHealthLogic
{
    /** @var  SearchesVisitorDailyHealth */
    private $SearchesVisitorDailyHealth;

    /**
     * SearchVisitorDailyHealthLogic constructor.
     * @param SearchesVisitorDailyHealth $SearchesVisitorDailyHealth
     */
    public function __construct(SearchesVisitorDailyHealth $SearchesVisitorDailyHealth)
    {
        $this->SearchesVisitorDailyHealth = $SearchesVisitorDailyHealth;
    }

    public function execute($id,$query)
    {
        return $this->SearchesVisitorDailyHealth->execute($id,$query);
    }


}