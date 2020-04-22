<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/4/2020
 * Time: 10:22 PM
 */

namespace App\Classes\Modules\ControllerLogic\Dashboard;


use App\Classes\Modules\Dashboard\Services\CreatesAnnouncement;
use Illuminate\Http\Request;

class CreateAnnouncementLogic
{
    /** @var  CreatesAnnouncement */
    private $CreatesAnnouncemet;

    /**
     * CreateAnnouncementLogic constructor.
     * @param CreatesAnnouncement $CreatesAnnouncemet
     */
    public function __construct(CreatesAnnouncement $CreatesAnnouncemet)
    {
        $this->CreatesAnnouncemet = $CreatesAnnouncemet;
    }

    public function execute(Request $request)
    {
        return $this->CreatesAnnouncemet->execute($request);
    }


}