<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23/4/2020
 * Time: 10:25 PM
 */

namespace App\Classes\Modules\ControllerLogic\Dashboard;


use App\Classes\Modules\Dashboard\Services\DeletesAnnouncement;

class DeleteAnnouncementLogic
{
    /** @var  DeletesAnnouncement */
    private $DeletesAnnouncement;

    /**
     * DeleteAnnouncementLogic constructor.
     * @param DeletesAnnouncement $DeletesAnnouncement
     */
    public function __construct(DeletesAnnouncement $DeletesAnnouncement)
    {
        $this->DeletesAnnouncement = $DeletesAnnouncement;
    }

    public function exucute($id)
    {
        return $this->DeletesAnnouncement->execute($id);
    }


}