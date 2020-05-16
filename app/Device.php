<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Device extends Model
{
    protected $fillable = ['brand','model','serial','description'];


    public function orders(){
        return $this->hasMany(Order::class); 
    }
}
