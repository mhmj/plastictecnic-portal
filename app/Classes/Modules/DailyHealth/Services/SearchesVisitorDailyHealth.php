<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13/5/2020
 * Time: 4:18 PM
 */

namespace App\Classes\Modules\DailyHealth\Services;


use App\Http\Resources\VisitorDailyHealth as VisitorDailyHealthResources;
use App\VisitorDailyHealthBangi;
use App\VisitorDailyHealthNilaiA;
use App\VisitorDailyHealthNilaiB;


class SearchesVisitorDailyHealth
{
    /** @var  VisitorDailyHealthBangi */
    private $repository_bangi;

    /** @var  VisitorDailyHealthNilaiA */
    private $repository_nilaiA;

    /** @var  VisitorDailyHealthNilaiB */
    private $repository_nilaiB;

    /**
     * SearchesVisitorDailyHealth constructor.
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

    public function execute($id, $query)
    {
        $date = strtotime($query);

        $date = date('Y-m-d',$date);

        if($id == 1)
        {
            $visitor = $this->repository_bangi->where('company_id',$id)
                ->where('created_at', 'LIKE', "%".$date."%")
                ->orWhere('name', 'LIKE', "%".$query."%")
                ->latest()
                ->paginate(5);
            return VisitorDailyHealthResources::collection($visitor);
        }
        if($id == 2)
        {
            $visitor = $this->repository_nilaiA->where('company_id',$id)
                ->where('created_at', 'LIKE', "%".$date."%")
                ->orWhere('name', 'LIKE', "%".$query."%")
                ->latest()
                ->paginate(5);

            return VisitorDailyHealthResources::collection($visitor);
        }
        if($id == 3)
        {
            $visitor = $this->repository_nilaiB->where('company_id',$id)
                ->where('created_at', 'LIKE', "%".$date."%")
                ->orWhere('name', 'LIKE', "%".$query."%")
                ->latest()
                ->paginate(5);

            return VisitorDailyHealthResources::collection($visitor);
        }
    }


}