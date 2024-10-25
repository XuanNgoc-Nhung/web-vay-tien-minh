<?php

namespace App\Http\Middleware;

use App\cauHinhWeb;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Kiểm tra session
        $userLogin = session('infoLogin'); // Thay 'key' bằng key bạn muốn
        $config = cauHinhWeb::where('id','1')->first();
        $linkCSKH = $config->cskh;
        if(Auth::check()){
            if($userLogin->ma_gioi_thieu){
                $admin = User::where('id',$userLogin->ma_gioi_thieu)->first();
                if($admin->cskh){
                    $linkCSKH = $admin->cskh;
                }
            }
        }
        view()->share('linkCSKH', $linkCSKH);
        return $next($request);
    }
}
