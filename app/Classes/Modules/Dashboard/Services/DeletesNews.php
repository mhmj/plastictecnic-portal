<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/4/2020
 * Time: 8:34 PM
 */

namespace App\Classes\Modules\Dashboard\Services;


use App\News;
use App\Http\Resources\News as NewsResources;

class DeletesNews
{
    /** @var  News */
    private $repository;

    /**
     * DeletesNews constructor.
     * @param News $repository
     */
    public function __construct(News $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id)
    {
        $news = $this->repository->findOrFail($id);

        if($news->delete()){

            return new NewsResources($news);
        }
    }


}