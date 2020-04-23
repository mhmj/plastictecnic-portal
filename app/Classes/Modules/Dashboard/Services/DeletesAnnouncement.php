<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23/4/2020
 * Time: 10:25 PM
 */

namespace App\Classes\Modules\Dashboard\Services;

use App\Announcement;
use App\Http\Resources\Announcement as AnnouncementResources;

class DeletesAnnouncement
{
    /** @var  Announcement */
    private $repository;

    /**
     * DeleteAnnouncementLogic constructor.
     * @param Announcement $repository
     */
    public function __construct(Announcement $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        $announcement = $this->repository->findOrFail($id);

        if($announcement->delete()){

            return new AnnouncementResources($announcement);
        }
    }
}