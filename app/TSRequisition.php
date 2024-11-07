<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class TSRequisition extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'tsrequisitions';
    protected $fillable = [
        'receive_by',
        'tsrequisition_code',
        'tsrequisition_date',
        'tsrequisition_delivery_date',
        'branch_id',
        'warehouse_from_id',
        'warehouse_to_id',
        'description',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function tsrequisitionDetails()
    {
        return $this->hasMany(TSRequisitionDetails::class, 'tsrequisition_id', 'id');
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
