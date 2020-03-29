<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetCategory extends Model
{
    protected $table='asset_category';

    protected $fillable = [
        'name', 'description'
    ];
}
