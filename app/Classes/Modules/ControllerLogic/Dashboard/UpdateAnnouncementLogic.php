<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/4/2020
 * Time: 11:17 PM
 */

namespace App\Classes\Modules\ControllerLogic\Dashboard;


use App\Classes\Modules\Dashboard\Services\UpdatesAnnouncement;
use Illuminate\Http\Request;

class UpdateAnnouncementLogic
{
    /** @var  UpdatesAnnouncement */
    private $UpdatesAnnouncement;

    /**
     * UpdateAnnouncementLogic constructor.
     * @param UpdatesAnnouncement $UpdatesAnnouncement
     */
    public function __construct(UpdatesAnnouncement $UpdatesAnnouncement)
    {
        $this->UpdatesAnnouncement = $UpdatesAnnouncement;
    }

    public function execute($id, Request $request)
    {
        return $this->UpdatesAnnouncement->execute($id,$request);
    }


}