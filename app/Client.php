<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['firstname','lastname','email','tel']; //Client::create metoda ne radi ako se ne definišu fillable polja


    public function orders(){
        return $this->hasMany(Order::class); 
    }
}
