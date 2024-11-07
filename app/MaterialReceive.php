<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class MaterialReceive extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'material_receives';
    protected $fillable = [
        'mrfor_id',
        'ps_id',
        'material_receive_code',
        'material_receive_date',
        'purchase_order_no',
        'purchase_order_date',
        'requisition_order_no',
        'requisition_order_date',
        'job_no',
        'inspection_name',
        'inspection_id',
        'vendor_id',
        'challan_no',
        'challan_date',
        'bill_no',
        'bill_date',
        'description',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function material_receiveDetails()
    {
        return $this->hasMany(MaterialReceiveDetails::class, 'material_receive_id', 'id');
    }
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }
    public function inspection()
    {
        return $this->belongsTo(Inspector::class, 'inspection_id', 'id');
    }
    public function receivedBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
