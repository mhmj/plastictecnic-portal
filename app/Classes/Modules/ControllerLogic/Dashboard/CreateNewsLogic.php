<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/4/2020
 * Time: 1:21 AM
 */

namespace App\Classes\Modules\ControllerLogic\Dashboard;


use App\Classes\Modules\Dashboard\Services\CreatesNews;
use Illuminate\Http\Request;

class CreateNewsLogic
{
    /** @var  CreatesNews */
    private $CreatesNews;

    /**
     * CreateNewsLogic constructor.
     * @param CreatesNews $CreatesNews
     */
    public function __construct(CreatesNews $CreatesNews)
    {
        $this->CreatesNews = $CreatesNews;
    }

    public function execute(Request $request)
    {
        return $this->CreatesNews->execute($request);
    }


}