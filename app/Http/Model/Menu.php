<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Http\Model\Menu
 *
 * @mixin \Eloquent
 */
class Menu extends Model
{
    protected $table = 'menu';


    public function show(){
        return $this->all();
    }
}
