<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/4/2020
 * Time: 1:22 AM
 */

namespace App\Classes\Modules\Dashboard\Services;


use App\News;
use Illuminate\Http\Request;

class CreatesNews
{
    /** @var  News */
    private $repository;

    /**
     * CreatesNews constructor.
     * @param News $repository
     */
    public function __construct(News $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Request $request)
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
            $fileNameToStore_1 = '';
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
            $fileNameToStore_2 = '';
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
            $fileNameToStore_3 = '';
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
            $fileNameToStore_4 = '';
        }

        $model = $this->repository->create([
            'staff_id' => $request->input('staff_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'remark' => $request->input('remark'),
            'image_1' => $fileNameToStore_1,
            'image_2' => $fileNameToStore_2,
            'image_3' => $fileNameToStore_3,
            'image_4' => $fileNameToStore_4,
        ]);

        return $model;
    }


}