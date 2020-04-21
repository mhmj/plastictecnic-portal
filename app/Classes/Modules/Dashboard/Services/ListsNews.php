<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/4/2020
 * Time: 5:58 PM
 */

namespace App\Classes\Modules\Dashboard\Services;


use App\News;
use App\Http\Resources\News as NewsResources;

class ListsNews
{
    /** @var  News */
    private $repository;

    /**
     * ListsNews constructor.
     * @param News $repository
     */
    public function __construct(News $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        $news = $this->repository->latest()->paginate(5);

        return NewsResources::collection($news);
    }


}