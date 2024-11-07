<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class TSItemIssue extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'tsitemissues';
    protected $fillable = [
        'tsitemissue_code',
        'tsitemissue_date',
        'branch_id',
        'warehouse_id',
        'section_id',
        'issue_by_id',
        'receive_by_id',
        'card_id',
        'description',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function tsitemissueDetails()
    {
        return $this->hasMany(TSItemIssueDetails::class, 'tsitemissue_id', 'id');
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
    public function received_by()
    {
        return $this->belongsTo(User::class, 'receive_by_id', 'id');
    }
}
