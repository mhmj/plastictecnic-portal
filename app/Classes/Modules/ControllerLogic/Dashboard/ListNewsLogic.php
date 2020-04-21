<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21/4/2020
 * Time: 5:57 PM
 */

namespace App\Classes\Modules\ControllerLogic\Dashboard;


use App\Classes\Modules\Dashboard\Services\ListsNews;

class ListNewsLogic
{
    /** @var  ListsNews */
    private $ListNews;

    /**
     * ListNewsLogic constructor.
     * @param ListsNews $ListNews
     */
    public function __construct(ListsNews $ListNews)
    {
        $this->ListNews = $ListNews;
    }

    public function execute()
    {
        return $this->ListNews->execute();
    }


}