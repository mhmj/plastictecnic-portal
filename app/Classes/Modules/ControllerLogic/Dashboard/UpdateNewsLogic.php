<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/4/2020
 * Time: 8:33 PM
 */

namespace App\Classes\Modules\ControllerLogic\Dashboard;


use App\Classes\Modules\Dashboard\Services\UpdatesNews;
use Illuminate\Http\Request;

class UpdateNewsLogic
{
    /** @var  UpdatesNews */
    private $UpdatesNews;

    /**
     * UpdateNewsLogic constructor.
     * @param UpdatesNews $UpdatesNews
     */
    public function __construct(UpdatesNews $UpdatesNews)
    {
        $this->UpdatesNews = $UpdatesNews;
    }

    public function execute($id, Request $request)
    {
        return $this->UpdatesNews->execute($id, $request);
    }


}