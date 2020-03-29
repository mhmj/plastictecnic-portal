<?php


namespace App\Classes\Modules\ControllerLogic\Staff;


use App\Classes\Modules\Staff\Services\ListsStaff;

class ListStaffLogic
{
    /** @var  ListsStaff */
    private $ListStaff;

    /**
     * ListStaffLogic constructor.
     * @param ListsStaff $ListStaff
     */
    public function __construct(ListsStaff $ListStaff)
    {
        $this->ListStaff = $ListStaff;
    }

    public function execute()
    {
        return $this->ListStaff->execute();
    }

}