<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27/4/2020
 * Time: 2:06 AM
 */

namespace App\Classes\Modules\Dashboard\Services;

use App\News;
use Illuminate\Http\Request;
use App\Http\Resources\News as NewsResources;

class UpdatesNewsImage
{
    /** @var  News */
    private $repository;

    /**
     * UpdatesNews constructor.
     * @param News $repository
     */
    public function __construct(News $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id, Request $request)
    {
        if($request->hasFile('image_1'))
        {

            $filenameWithExt = $request->image_1->getClientOriginalName();
            $filename1 = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->image_1->getClientOriginalExtension();
            $fileNameToStore_1= $filename1.'_'.time().'.'.$extension;
            $path = $request->image_1->storeAs('public/News', $fileNameToStore_1);

        }
        else
        {
            $fileNameToStore_1 = 'null';
        }

        if($request->hasFile('image_2'))
        {

            $filenameWithExt = $request->image_2->getClientOriginalName();
            $filename2 = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->image_2->getClientOriginalExtension();
            $fileNameToStore_2= $filename2.'_'.time().'.'.$extension;
            $path = $request->image_2->storeAs('public/News', $fileNameToStore_2);

        }
        else
        {
            $fileNameToStore_2 = 'null';
        }

        if($request->hasFile('image_3'))
        {

            $filenameWithExt = $request->image_3->getClientOriginalName();
            $filename3 = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->image_3->getClientOriginalExtension();
            $fileNameToStore_3= $filename3.'_'.time().'.'.$extension;
            $path = $request->image_3->storeAs('public/News', $fileNameToStore_3);

        }
        else
        {
            $fileNameToStore_3 = 'null';
        }

        if($request->hasFile('image_4'))
        {

            $filenameWithExt = $request->image_4->getClientOriginalName();
            $filename4 = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->image_4->getClientOriginalExtension();
            $fileNameToStore_4= $filename4.'_'.time().'.'.$extension;
            $path = $request->image_4->storeAs('public/News', $fileNameToStore_4);

        }
        else
        {
            $fileNameToStore_4 = 'null';
        }


        $news = $this->repository->findOrFail($id);

        $news->image_1 =$fileNameToStore_1;
        $news->image_2 =$fileNameToStore_2;
        $news->image_3 =$fileNameToStore_3;
        $news->image_4 =$fileNameToStore_4;

        if($news->save()){
            return new NewsResources($news);
        }
    }
}