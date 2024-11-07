<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Opening extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'openings';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'opening_code',
        'opening_date',
        'branch_id',
        'warehouse_id',
        'group_id',
        'subgroup_id',
        'item_id',
        'opening_quantity',
        'opening_price',
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
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
