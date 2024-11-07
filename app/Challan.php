<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Challan extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'challans';
    protected $fillable = [
        'requisition_id',
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
    public function requisition()
    {
        return $this->belongsTo(Requisition::class, 'requisition_id', 'id');
    }
    public function challanDetails()
    {
        return $this->hasMany(ChallanDetails::class, 'challan_id', 'id');
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
}
