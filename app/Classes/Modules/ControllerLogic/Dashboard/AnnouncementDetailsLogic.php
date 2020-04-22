<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/4/2020
 * Time: 4:14 PM
 */

namespace App\Classes\Modules\ControllerLogic\Dashboard;


use App\Classes\Modules\Dashboard\Services\AnnouncementsDetails;

class AnnouncementDetailsLogic
{
    /** @var  AnnouncementsDetails */
    private $AnnouncementDetails;

    /**
     * AnnouncementDetailsLogic constructor.
     * @param AnnouncementsDetails $AnnouncementDetails
     */
    public function __construct(AnnouncementsDetails $AnnouncementDetails)
    {
        $this->AnnouncementDetails = $AnnouncementDetails;
    }

    public function execute($id)
    {
        return $this->AnnouncementDetails->execute($id);
    }


}