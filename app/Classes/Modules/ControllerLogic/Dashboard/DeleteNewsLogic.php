<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/4/2020
 * Time: 8:33 PM
 */

namespace App\Classes\Modules\ControllerLogic\Dashboard;


use App\Classes\Modules\Dashboard\Services\DeletesNews;

class DeleteNewsLogic
{
    /** @var  DeletesNews */
    private $DeletesNews;

    /**
     * DeleteNewsLogic constructor.
     * @param DeletesNews $DeletesNews
     */
    public function __construct(DeletesNews $DeletesNews)
    {
        $this->DeletesNews = $DeletesNews;
    }

    public function execute($id)
    {
        return $this->DeletesNews->execute($id);
    }


}