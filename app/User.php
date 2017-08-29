<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;


// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Eloquent implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'users';

    protected $primaryKey = 'id';
    //指定允许批量复赋值的字段
    protected $fillable = ['name','email','password','register_from'];
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


