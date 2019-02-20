<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Category()
    {
        return $this->hasOne('App\Category');
    }

    public function Comment()
    {
        return $this->hasMany('App\Comment'); 
    }
    
    public function User()
    {
        return $this->BelongTo('App/User');
    }
}
