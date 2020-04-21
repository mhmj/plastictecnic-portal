<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/4/2020
 * Time: 4:09 PM
 */

namespace App\Classes\Modules\Dashboard\Services;


use App\Announcement;
use App\Http\Resources\Announcement as AnnouncementResources;

class ListsAnnouncement
{
    /** @var  Announcement */
    private $repository;

    /**
     * ListsAnnouncement constructor.
     * @param Announcement $repository
     */
    public function __construct(Announcement $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        $announcement = $this->repository->latest()->paginate(5);

        return AnnouncementResources::collection($announcement);
    }


}