<?php

namespace App\Http\Model;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Eloquent implements Authenticatable
{
    use Notifiable;
    use AuthenticableTrait;

    protected $table = 'users';
    protected $primaryKey = 'id';

    //指定必须赋值的字段
    protected $fillable = ['name','email','password','avatar','is_active','confirmation_token'];
    //指定不允许批量赋值的字段
    //protected $guarded = [];

    // protected $dateFormat = 'U';
    //
    //自动维护时间戳
    //public $timestamps  =  true;



    /*    protected function getDateFormat(){
            return time();
        }
        protected function asDateTime($val){
            return $val;
        }*/
}


