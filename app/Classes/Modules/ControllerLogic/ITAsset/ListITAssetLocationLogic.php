<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/4/2020
 * Time: 3:15 AM
 */

namespace App\Classes\Modules\ControllerLogic\ITAsset;


use App\Classes\Modules\ITAsset\Services\ListsITAssetBangi;
use App\Classes\Modules\ITAsset\Services\ListsITAssetNilaiA;
use App\Classes\Modules\ITAsset\Services\ListsITAssetNilaiB;

class ListITAssetLocationLogic
{
    /** @var  ListsITAssetBangi */
    private $ListITAssetBangi;

    /** @var  ListsITAssetNilaiA */
    private $ListITAssetNilaiA;

    /** @var  ListsITAssetNilaiB */
    private $ListITAssetNilaiB;

    /**
     * ListITAssetLocationLogic constructor.
     * @param ListsITAssetBangi $ListITAssetBangi
     * @param ListsITAssetNilaiA $ListITAssetNilaiA
     * @param ListsITAssetNilaiB $ListITAssetNilaiB
     */
    public function __construct(ListsITAssetBangi $ListITAssetBangi, ListsITAssetNilaiA $ListITAssetNilaiA, ListsITAssetNilaiB $ListITAssetNilaiB)
    {
        $this->ListITAssetBangi = $ListITAssetBangi;
        $this->ListITAssetNilaiA = $ListITAssetNilaiA;
        $this->ListITAssetNilaiB = $ListITAssetNilaiB;
    }


    public function execute(int $id, string $category)
    {
        if($category === 'bangi')
        {
            return $this->ListITAssetBangi->execute($id);
        }
        elseif ($category === 'nilaiA'){

            return $this->ListITAssetNilaiA->execute($id);
        }
        elseif ($category === 'nilaiB'){

            return $this->ListITAssetNilaiB->execute($id);
        }
    }
}