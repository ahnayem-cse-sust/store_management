<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class TSChallan extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'tschallans';
    protected $fillable = [
        'tsrequisition_id',
        'warehouse_from_id',
        'warehouse_to_id',
        'challan_code',
        'challan_date',
        'delivery_man',
        'delivery_place',
        'branch_id',
        'job_id',
        'party_id',
        'section_id',
        'warehouse_id',
        'description',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function tsrequisition()
    {
        return $this->belongsTo(TSRequisition::class, 'tsrequisition_id', 'id');
    }
    public function challanDetails()
    {
        return $this->hasMany(TSChallanDetails::class, 'challan_id', 'id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function warehouseFrom()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_from_id', 'id');
    }
    public function warehouseTo()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_to_id', 'id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
