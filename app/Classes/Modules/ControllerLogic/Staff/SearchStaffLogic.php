<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/4/2020
 * Time: 5:54 PM
 */

namespace App\Classes\Modules\ControllerLogic\Staff;


use App\Classes\Modules\Staff\Services\SearchesStaff;

class SearchStaffLogic
{
    /** @var  SearchesStaff */
    private $SearchesStaff;

    /**
     * SearchStaffLogic constructor.
     * @param SearchesStaff $SearchesStaff
     */
    public function __construct(SearchesStaff $SearchesStaff)
    {
        $this->SearchesStaff = $SearchesStaff;
    }

    public function execute($id, $query)
    {
        return $this->SearchesStaff->execute($id,$query);
    }


}