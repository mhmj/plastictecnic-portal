<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ITAsset extends Model
{

    protected $table='it_asset';

    protected $fillable = [
        'asset_category_id', 'company_id', 'staff_id', 'it_asset_brand_id', 'model', 'OS','computer_name','username','office', 'remark', 'serial_no', 'service_tag', 'year_purchased', 'warranty_status', 'warranty_period', 'status', 'it_asset_no'
    ];
}
