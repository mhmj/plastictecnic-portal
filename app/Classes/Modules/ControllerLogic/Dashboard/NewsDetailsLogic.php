<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/4/2020
 * Time: 8:24 PM
 */

namespace App\Classes\Modules\ControllerLogic\Dashboard;


use App\Classes\Modules\Dashboard\Services\NewsDetails;

class NewsDetailsLogic
{
    /** @var  NewsDetails */
    private $NewsDetails;

    /**
     * NewsDetailsLogic constructor.
     * @param NewsDetails $NewsDetails
     */
    public function __construct(NewsDetails $NewsDetails)
    {
        $this->NewsDetails = $NewsDetails;
    }

    public function execute($id)
    {
        return $this->NewsDetails->execute($id);
    }


}