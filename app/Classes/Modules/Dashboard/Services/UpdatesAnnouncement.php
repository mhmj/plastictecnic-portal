<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/4/2020
 * Time: 11:17 PM
 */

namespace App\Classes\Modules\Dashboard\Services;


use App\Announcement;
use App\Http\Resources\Announcement as AnnouncementResources;
use Illuminate\Http\Request;

class UpdatesAnnouncement
{
    /** @var  Announcement */
    private $repository;

    /**
     * UpdatesAnnouncement constructor.
     * @param Announcement $repository
     */
    public function __construct(Announcement $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id,Request $request)
    {

        if($request->hasFile('file'))
        {

            $filenameWithExt = $request->file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file->storeAs('public/Announcement', $fileNameToStore);

        }
        else
        {
            $fileNameToStore = $request->file;
        }

        $announcement = $this->repository->findOrFail($id);
        $announcement->staff_id = $request->input('staff_id');
        $announcement->title = $request->input('title');
        $announcement->description = $request->input('description');
        $announcement->category = $request->input('category');
        $announcement->remark = $request->input('remark');
        $announcement->file =$fileNameToStore;

        if($announcement->save()){
            return new AnnouncementResources($announcement);
        }
    }

}