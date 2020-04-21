<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/4/2020
 * Time: 4:06 PM
 */

namespace App\Classes\Modules\ControllerLogic\Dashboard;


use App\Classes\Modules\Dashboard\Services\ListsAnnouncement;

class ListAnnouncementLogic
{
    /** @var  ListsAnnouncement */
    private $ListsAnnouncement;

    /**
     * ListAnnouncementLogic constructor.
     * @param ListsAnnouncement $ListsAnnouncement
     */
    public function __construct(ListsAnnouncement $ListsAnnouncement)
    {
        $this->ListsAnnouncement = $ListsAnnouncement;
    }

    public function execute()
    {
        return $this->ListsAnnouncement->execute();
    }


}