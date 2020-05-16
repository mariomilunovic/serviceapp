<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Device extends Model
{
    protected $fillable = ['make','model','serial','description'];


    public function orders(){
        return $this->hasMany(Order::class); 
    }
}
