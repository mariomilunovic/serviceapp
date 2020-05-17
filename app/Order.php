<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [

        'user_id',
        'client_id',
        'device_id',
        'status_id',
        'problem_description',
        'internal_comment',
        'public_comment',
        'payment_status',
        'access_code'
    
    ]; //Client::create metoda ne radi ako se ne definišu fillable polja


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
