<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class DemageItem extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'demageitems';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'demageitem_code',
        'item_id',
        'group_id',
        'subgroup_id',
        'branch_id',
        'warehouse_id',
        'demage_by',
        'demage_authority',
        'quantity',
        'description',
        'demage_date',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function subgroup()
    {
        return $this->belongsTo(SubGroup::class);
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function demageBy()
    {
        return $this->belongsTo(User::class, 'demage_by', 'id');
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
