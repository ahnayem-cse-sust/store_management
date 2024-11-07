<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes;

    public $table = 'ltm_translations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status',
        'locale',
        'group',
        'key',
        'value',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}