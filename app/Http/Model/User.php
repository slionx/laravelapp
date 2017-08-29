<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

//use App\Http\Requests;
//use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The articles function.
     *
     * return hasmany articles
     */
    public function articles()
    {
        return $this->hasMany('Article');
    }

    static function find($id)
    {
        return $results = DB::table('users')->where('id', $id)->first();
        //DB::select('select * from users where id = :id', ['id' => $id]);
    }
    static function updatepassword($id,$data)
    {
        return $results = DB::table('users')->where('id', $id)->update(['password' => $data]);;
        //DB::select('select * from users where id = :id', ['id' => $id]);
    }
}
