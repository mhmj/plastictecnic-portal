<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16/4/2020
 * Time: 3:40 PM
 */

namespace App\Classes\Modules\ControllerLogic\Licensing;


use App\Classes\Modules\Licensing\Services\SearchesLicensing;

class SearchLicensingLogic
{
    /** @var  SearchesLicensing */
    private $SearchesLicensing;

    /**
     * SearchLicensingLogic constructor.
     * @param SearchesLicensing $SearchesLicensing
     */
    public function __construct(SearchesLicensing $SearchesLicensing)
    {
        $this->SearchesLicensing = $SearchesLicensing;
    }

    public function execute($id, $query)
    {
        return $this->SearchesLicensing->execute($id, $query);
    }


}