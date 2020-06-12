<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11/6/2020
 * Time: 11:18 AM
 */

namespace App\Classes\Modules\ControllerLogic\DailyHealth;


use App\Classes\Modules\DailyHealth\Services\SearchesAllDailyHealthByDate;

class SearchAllDailyHealthByDateLogic
{
    /** @var  SearchesAllDailyHealthByDate */
    private $SearchesAllDailyHealthByDate;

    /**
     * SearchAllDailyHealthByDateLogic constructor.
     * @param SearchesAllDailyHealthByDate $SearchesAllDailyHealthByDate
     */
    public function __construct(SearchesAllDailyHealthByDate $SearchesAllDailyHealthByDate)
    {
        $this->SearchesAllDailyHealthByDate = $SearchesAllDailyHealthByDate;
    }

    public function execute($companyId, $query)
    {
        return $this->SearchesAllDailyHealthByDate->execute($companyId, $query);
    }


}