<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'manufacturers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'manufacturer_code',
        'manufacturer_name',
        'manufacturer_address',
        'country_of_origin',
        'contact_person',
        'contact_no',
        'email_address',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
    ];
}
