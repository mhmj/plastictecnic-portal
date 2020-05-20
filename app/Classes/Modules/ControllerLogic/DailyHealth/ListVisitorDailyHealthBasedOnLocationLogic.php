<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13/5/2020
 * Time: 4:01 PM
 */

namespace App\Classes\Modules\ControllerLogic\DailyHealth;

use App\Classes\Modules\DailyHealth\Services\ListVisitorDailyHealth;

class ListVisitorDailyHealthBasedOnLocationLogic
{
    /** @var  ListVisitorDailyHealth */
    private $ListVisitorDailyHealth;

    /**
     * ListDailyHealthBasedOnLocationLogic constructor.
     * @param ListVisitorDailyHealth $ListVisitorDailyHealth
     */
    public function __construct(ListVisitorDailyHealth $ListVisitorDailyHealth)
    {
        $this->ListVisitorDailyHealth = $ListVisitorDailyHealth;
    }

    public function execute($id, $category)
    {
        if($category === 'bangi')
        {
            return $this->ListVisitorDailyHealth->execute($id);
        }
        if($category === 'nilaiA')
        {
            return $this->ListVisitorDailyHealth->execute($id);
        }
        if($category === 'nilaiB')
        {
            return $this->ListVisitorDailyHealth->execute($id);
        }
    }
}