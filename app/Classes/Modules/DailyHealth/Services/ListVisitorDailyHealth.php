<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/5/2020
 * Time: 5:31 PM
 */

namespace App\Classes\Modules\DailyHealth\Services;

use App\Http\Resources\VisitorDailyHealth as VisitorDailyHealthResources;
use App\VisitorDailyHealthBangi;
use App\VisitorDailyHealthNilaiA;
use App\VisitorDailyHealthNilaiB;

class ListVisitorDailyHealth
{
    /** @var  VisitorDailyHealthBangi */
    private $repository_bangi;

    /** @var  VisitorDailyHealthNilaiA */
    private $repository_nilaiA;

    /** @var  VisitorDailyHealthNilaiB */
    private $repository_nilaiB;

    /**
     * ListVisitorDailyHealth constructor.
     * @param VisitorDailyHealthBangi $repository_bangi
     * @param VisitorDailyHealthNilaiA $repository_nilaiA
     * @param VisitorDailyHealthNilaiB $repository_nilaiB
     */
    public function __construct(VisitorDailyHealthBangi $repository_bangi, VisitorDailyHealthNilaiA $repository_nilaiA, VisitorDailyHealthNilaiB $repository_nilaiB)
    {
        $this->repository_bangi = $repository_bangi;
        $this->repository_nilaiA = $repository_nilaiA;
        $this->repository_nilaiB = $repository_nilaiB;
    }


    public function execute($id)
    {
        if($id == 1)
        {
            $visitor = $this->repository_bangi->where('company_id',$id)->latest()->paginate(5);
            return VisitorDailyHealthResources::collection($visitor);
        }
        if($id == 2)
        {
            $visitor = $this->repository_nilaiA->where('company_id',$id)->latest()->paginate(5);
            return VisitorDailyHealthResources::collection($visitor);
        }
        if($id == 3)
        {
            $visitor = $this->repository_nilaiB->where('company_id',$id)->latest()->paginate(5);
            return VisitorDailyHealthResources::collection($visitor);
        }

    }


}