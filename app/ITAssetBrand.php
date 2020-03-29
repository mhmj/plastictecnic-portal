<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ITAssetBrand extends Model
{
    protected $table='it_asset_brand';

    protected $fillable = [
        'name', 'description'
    ];
}
