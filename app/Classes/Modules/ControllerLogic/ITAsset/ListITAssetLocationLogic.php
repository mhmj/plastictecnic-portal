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
use App\Classes\Modules\ITAsset\Services\Staff\ListsITAssetGoodhart;

class ListITAssetLocationLogic
{
    /** @var  ListsITAssetBangi */
    private $ListITAssetBangi;

    /** @var  ListsITAssetNilaiA */
    private $ListITAssetNilaiA;

    /** @var  ListsITAssetNilaiB */
    private $ListITAssetNilaiB;

    /** @var  ListsITAssetGoodhart */
    private $ListITAssetGoodhart;

    /**
     * ListITAssetLocationLogic constructor.
     * @param ListsITAssetBangi $ListITAssetBangi
     * @param ListsITAssetNilaiA $ListITAssetNilaiA
     * @param ListsITAssetNilaiB $ListITAssetNilaiB
     * @param ListsITAssetGoodhart $ListITAssetGoodhart
     */
    public function __construct(ListsITAssetBangi $ListITAssetBangi, ListsITAssetNilaiA $ListITAssetNilaiA, ListsITAssetNilaiB $ListITAssetNilaiB, ListsITAssetGoodhart $ListITAssetGoodhart)
    {
        $this->ListITAssetBangi = $ListITAssetBangi;
        $this->ListITAssetNilaiA = $ListITAssetNilaiA;
        $this->ListITAssetNilaiB = $ListITAssetNilaiB;
        $this->ListITAssetGoodhart = $ListITAssetGoodhart;
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
        elseif ($category === 'goodhart'){

            return $this->ListITAssetGoodhart->execute($id);
        }
    }
}