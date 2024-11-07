<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupVolume extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'groupvolumes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'group_id',
        'groupvolume_code',
        'groupvolume_name',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'updated_by',
    ];
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}
