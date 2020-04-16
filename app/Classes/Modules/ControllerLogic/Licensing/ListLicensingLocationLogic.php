<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:38 PM
 */

namespace App\Classes\Modules\ControllerLogic\Licensing;


use App\Classes\Modules\Licensing\Services\ListsLicensingBangi;
use App\Classes\Modules\Licensing\Services\ListsLicensingNilaiA;
use App\Classes\Modules\Licensing\Services\ListsLicensingNilaiB;

class ListLicensingLocationLogic
{
    /** @var  ListsLicensingBangi */
    private $ListsLicensingBangi;

    /** @var  ListsLicensingNilaiA */
    private $ListsLicensingNilaiA;

    /** @var  ListsLicensingNilaiB */
    private $ListsLicensingNilaiB;

    /**
     * ListLicensingLocationLogic constructor.
     * @param ListsLicensingBangi $ListsLicensingBangi
     * @param ListsLicensingNilaiA $ListsLicensingNilaiA
     * @param ListsLicensingNilaiB $ListsLicensingNilaiB
     */
    public function __construct(ListsLicensingBangi $ListsLicensingBangi, ListsLicensingNilaiA $ListsLicensingNilaiA, ListsLicensingNilaiB $ListsLicensingNilaiB)
    {
        $this->ListsLicensingBangi = $ListsLicensingBangi;
        $this->ListsLicensingNilaiA = $ListsLicensingNilaiA;
        $this->ListsLicensingNilaiB = $ListsLicensingNilaiB;
    }

    public function execute(int $id, string $category)
    {
        if($category === 'bangi')
        {
            return $this->ListsLicensingBangi->execute($id);
        }
        elseif ($category === 'nilaiA'){

            return $this->ListsLicensingNilaiA->execute($id);
        }
        elseif ($category === 'nilaiB'){

            return $this->ListsLicensingNilaiB->execute($id);
        }
    }


}