<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/4/2020
 * Time: 4:15 PM
 */

namespace App\Classes\Modules\Dashboard\Services;


use App\Announcement;
use App\Http\Resources\Announcement as AnnouncementResources;


class AnnouncementsDetails
{
    /** @var  Announcement */
    private $repository;

    /**
     * AnnouncementsDetails constructor.
     * @param Announcement $repository
     */
    public function __construct(Announcement $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id)
    {
        $announcement = $this->repository->findOrFail($id);

        return new AnnouncementResources($announcement);

    }


}