<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/4/2020
 * Time: 8:25 PM
 */

namespace App\Classes\Modules\ControllerLogic\Staff;


use App\Classes\Modules\Staff\Services\ListsStaffBangi;
use App\Classes\Modules\Staff\Services\ListsStaffNilaiA;
use App\Classes\Modules\Staff\Services\ListsStaffNilaiB;

class ListStaffLocationLogic
{
    /** @var  ListsStaffBangi */
    private $ListsStaffBangi;

    /** @var  ListsStaffNilaiA */
    private $ListsStaffNilaiA;

    /** @var  ListsStaffNilaiB */
    private $ListsStaffNilaiB;

    /**
     * ListStaffLocationLogic constructor.
     * @param ListsStaffBangi $ListsStaffBangi
     * @param ListsStaffNilaiA $ListsStaffNilaiA
     * @param ListsStaffNilaiB $ListsStaffNilaiB
     */
    public function __construct(ListsStaffBangi $ListsStaffBangi, ListsStaffNilaiA $ListsStaffNilaiA, ListsStaffNilaiB $ListsStaffNilaiB)
    {
        $this->ListsStaffBangi = $ListsStaffBangi;
        $this->ListsStaffNilaiA = $ListsStaffNilaiA;
        $this->ListsStaffNilaiB = $ListsStaffNilaiB;
    }

    public function execute(int $id, string $category)
    {
        if($category === 'bangi')
        {
            return $this->ListsStaffBangi->execute($id);
        }
        elseif ($category === 'nilaiA'){

            return $this->ListsStaffNilaiA->execute($id);
        }
        elseif ($category === 'nilaiB'){

            return $this->ListsStaffNilaiB->execute($id);
        }
        elseif ($category === 'goodhart'){

            return $this->ListsStaffNilaiB->execute($id);
        }

    }


}