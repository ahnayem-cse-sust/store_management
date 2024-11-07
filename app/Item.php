<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Item extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'items';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
    ];

    protected $fillable = [
        'item_code',
        'item_name',
        'group_id',
        'subgroup_id',
        'unit_id',
        'manufacturer_id',
        'brand_id',
        'model_id',
        'purchase_price',
        'cost_price',
        'sale_price',
        'sku',
        'branch_id',
        'room_id',
        'rack_id',
        'shelf_id',
        'page_location',
        'volume_location',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function subgroup()
    {
        return $this->belongsTo(SubGroup::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function model()
    {
        return $this->belongsTo(Models::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function rack()
    {
        return $this->belongsTo(Rack::class);
    }
    public function shelf()
    {
        return $this->belongsTo(Shelf::class);
    }
}
