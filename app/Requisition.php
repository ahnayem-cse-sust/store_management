<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Requisition extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'requisitions';
    protected $fillable = [
        'requisitionfor_id',
        'requisition_code',
        'requisition_date',
        'requisition_delivery_date',
        'branch_id',
        'job_id',
        'party_id',
        'section_id',
        'warehouse_id',
        'receive_by',
        'description',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function requisitionDetails()
    {
        return $this->hasMany(RequisitionDetails::class, 'requisition_id', 'id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }
    public function party()
    {
        return $this->belongsTo(Party::class, 'party_id', 'id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function requisition_for()
    {
        return $this->belongsTo(RequisitionFor::class, 'requisitionfor_id', 'id');
    }
}
