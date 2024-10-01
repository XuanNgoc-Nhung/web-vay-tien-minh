<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichSu extends Model
{
    protected $fillable = [
        'account','action'
    ];
    protected $table = 'lich_su';
}
