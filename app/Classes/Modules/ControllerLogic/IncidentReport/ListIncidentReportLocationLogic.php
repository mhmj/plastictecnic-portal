<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/4/2020
 * Time: 1:56 PM
 */

namespace App\Classes\Modules\ControllerLogic\IncidentReport;


use App\Classes\Modules\IncidentReport\Services\ListsIncidentReportBangi;
use App\Classes\Modules\IncidentReport\Services\ListsIncidentReportGoodhart;
use App\Classes\Modules\IncidentReport\Services\ListsIncidentReportNilaiA;
use App\Classes\Modules\IncidentReport\Services\ListsIncidentReportNilaiB;

class ListIncidentReportLocationLogic
{
    /** @var  ListsIncidentReportBangi */
    private $ListsIncidentReportBangi;

    /** @var  ListsIncidentReportNilaiA */
    private $ListsIncidentReportNilaiA;

    /** @var  ListsIncidentReportNilaiB */
    private $ListsIncidentReportNilaiB;

    /** @var  ListsIncidentReportGoodhart */
    private $ListsIncidentReportGoodhart;


    /**
     * ListIncidentReportLocationLogic constructor.
     * @param ListsIncidentReportBangi $ListsIncidentReportBangi
     * @param ListsIncidentReportNilaiA $ListsIncidentReportNilaiA
     * @param ListsIncidentReportNilaiB $ListsIncidentReportNilaiB
     * @param ListsIncidentReportGoodhart $ListsIncidentReportGoodhart
     */
    public function __construct(ListsIncidentReportBangi $ListsIncidentReportBangi, ListsIncidentReportNilaiA $ListsIncidentReportNilaiA, ListsIncidentReportNilaiB $ListsIncidentReportNilaiB, ListsIncidentReportGoodhart $ListsIncidentReportGoodhart)
    {
        $this->ListsIncidentReportBangi = $ListsIncidentReportBangi;
        $this->ListsIncidentReportNilaiA = $ListsIncidentReportNilaiA;
        $this->ListsIncidentReportNilaiB = $ListsIncidentReportNilaiB;
        $this->ListsIncidentReportGoodhart = $ListsIncidentReportGoodhart;
    }


    public function execute(int $id, string $category)
    {
        if($category === 'bangi')
        {
            return $this->ListsIncidentReportBangi->execute($id);
        }
        elseif ($category === 'nilaiA'){

            return $this->ListsIncidentReportNilaiA->execute($id);
        }
        elseif ($category === 'nilaiB'){

            return $this->ListsIncidentReportNilaiB->execute($id);
        }
        elseif ($category === 'goodhart'){

            return $this->ListsIncidentReportNilaiB->execute($id);
        }
    }


}