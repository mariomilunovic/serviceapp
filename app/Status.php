<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function orders(){
        return $this->hasMany(Order::class); // selet * from orders where status_id = status_instance_id
    }
}

