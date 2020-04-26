<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27/4/2020
 * Time: 2:06 AM
 */

namespace App\Classes\Modules\ControllerLogic\Dashboard;


use App\Classes\Modules\Dashboard\Services\UpdatesNewsImage;
use Illuminate\Http\Request;

class UpdateNewsImageLogic
{
    /** @var  UpdatesNewsImage */
    private $UpdatesNewsImage;

    /**
     * UpdateNewsImageLogic constructor.
     * @param UpdatesNewsImage $UpdatesNewsImage
     */
    public function __construct(UpdatesNewsImage $UpdatesNewsImage)
    {
        $this->UpdatesNewsImage = $UpdatesNewsImage;
    }

    public function execute($id, Request $request)
    {
        return $this->UpdatesNewsImage->execute($id, $request);
    }


}