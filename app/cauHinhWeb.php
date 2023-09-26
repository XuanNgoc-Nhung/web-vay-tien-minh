<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cauHinhWeb extends Model
{

    protected $fillable = [
        'lai_suat_ca_nhan','lai_suat_doanh_nghiep'
    ];
    protected $table = 'config_web';
}
