<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 19/5/2020
 * Time: 1:43 PM
 */

namespace App\Classes\Modules\ControllerLogic\DailyHealth;


use App\Classes\Modules\DailyHealth\Services\CreatesStaffDailyHealth;
use Illuminate\Http\Request;

class CreateStaffDailyHealthLogic
{
    /** @var  CreatesStaffDailyHealth */
    private $CreatesStaffDailyHealth;

    /**
     * CreateStaffDailyHealthLogic constructor.
     * @param CreatesStaffDailyHealth $CreatesStaffDailyHealth
     */
    public function __construct(CreatesStaffDailyHealth $CreatesStaffDailyHealth)
    {
        $this->CreatesStaffDailyHealth = $CreatesStaffDailyHealth;
    }

    public function execute(Request $request)
    {
        return $this->CreatesStaffDailyHealth->execute($request);
    }

}