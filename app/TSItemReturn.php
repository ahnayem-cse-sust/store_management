<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class TSItemReturn extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'tsitemreturns';
    protected $fillable = [
        'tsitemissue_id',
        'tsitemreturn_code',
        'tsitemreturn_date',
        'branch_id',
        'warehouse_id',
        'section_id',
        'card_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function tsitemreturnDetails()
    {
        return $this->hasMany(TSItemReturnDetails::class, 'tsitemreturn_id', 'id');
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id', 'id');
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }
    public function tsitemissue()
    {
        return $this->belongsTo(TSItemIssue::class, 'tsitemissue_id', 'id');
    }
}
