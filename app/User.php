<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','status','role','thong_bao','type','luoi_khach','ma_gioi_thieu','trang_thai_vay','cskh'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function thongTinTaiKhoan(){
        return $this->hasOne(thongTinCaNhan::class,'user_id','id');
    }
    public function routeNotificationForTelegram()
    {
        return $this->user_id;
    }

    public function nguoiGioiThieu(){
        return $this->hasOne(User::class,'id','ma_gioi_thieu');
    }
}
