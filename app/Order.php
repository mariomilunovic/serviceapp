<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function status(){
        return $this->belongsTo(Status::class); 
    }

    public function user(){
        return $this->belongsTo(User::class); 
    }

    public function client(){
        return $this->belongsTo(Client::class); 
    }

    public function device(){
        return $this->belongsTo(Device::class); 
    }

    
}
