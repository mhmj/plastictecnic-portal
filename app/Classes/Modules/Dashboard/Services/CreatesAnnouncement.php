<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 22/4/2020
 * Time: 10:22 PM
 */

namespace App\Classes\Modules\Dashboard\Services;


use App\Announcement;
use Illuminate\Http\Request;

class CreatesAnnouncement
{
    /** @var  Announcement */
    private $repository;

    /**
     * CreatesAnnouncement constructor.
     * @param Announcement $repository
     */
    public function __construct(Announcement $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Request $request)
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
            $fileNameToStore = '';
        }

        $model = $this->repository->create([
            'staff_id' => $request->input('staff_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'remark' => $request->input('remark'),
            'file' => $fileNameToStore,
        ]);

        return $model;
    }


}