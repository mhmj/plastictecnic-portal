<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licensing extends Model
{
    protected $table='licensing';

    protected $fillable = [
        'it_asset_id', 'company_id', 'license_name', 'license_no', 'vendor', 'serial_key', 'version', 'quantity', 'remark', 'date_purchased', 'date_expired'
    ];
}
