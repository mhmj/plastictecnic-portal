<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/5/2020
 * Time: 1:47 PM
 */

namespace App\Classes\Modules\ControllerLogic\DailyHealth;


use App\Classes\Modules\DailyHealth\Services\SearchesStaffDailyHealthByDate;

class SearchStaffDailyHealthByDateLogic
{
    /** @var  SearchesStaffDailyHealthByDate */
    private $SearchesStaffDailyHealthByDate;

    /**
     * SearchStaffDailyHealthByDateLogic constructor.
     * @param SearchesStaffDailyHealthByDate $SearchesStaffDailyHealthByDate
     */
    public function __construct(SearchesStaffDailyHealthByDate $SearchesStaffDailyHealthByDate)
    {
        $this->SearchesStaffDailyHealthByDate = $SearchesStaffDailyHealthByDate;
    }

    public function execute($id, $query)
    {
        return $this->SearchesStaffDailyHealthByDate->execute($id,$query);
    }


}