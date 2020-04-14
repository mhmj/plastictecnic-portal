<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14/4/2020
 * Time: 2:10 PM
 */

namespace App\Classes\Modules\ControllerLogic\ITAsset;


use App\Classes\Modules\ITAsset\Services\SearchesITAsset;
use Illuminate\Http\Request;

class SearchITAssetLogic
{
    /** @var  SearchesITAsset */
    private $SearchesITAsset;

    /**
     * SearchITAssetLogic constructor.
     * @param SearchesITAsset $SearchesITAsset
     */
    public function __construct(SearchesITAsset $SearchesITAsset)
    {
        $this->SearchesITAsset = $SearchesITAsset;
    }

    public function execute($id, $query)
    {
        return $this->SearchesITAsset->execute($id, $query);
    }


}