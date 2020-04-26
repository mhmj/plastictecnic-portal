<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/4/2020
 * Time: 8:24 PM
 */

namespace App\Classes\Modules\Dashboard\Services;


use App\News;
use App\Http\Resources\News as NewsResouces;

class NewsDetails
{
    /** @var  News */
    private $repository;

    /**
     * NewsDetails constructor.
     * @param News $repository
     */
    public function __construct(News $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id)
    {
        $news = $this->repository->findOrFail($id);
        return new NewsResouces($news);
    }


}