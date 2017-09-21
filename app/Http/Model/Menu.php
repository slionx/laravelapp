<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';


    public function show(){
        return $this->all();
    }
}
