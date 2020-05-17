<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Order;

class CheckStatus extends Component
{
    public $order;
    public $code;
    public $message = "";
    public $messageClass = "";


    public function updated($code)
    {
         $this->validate(['code'=>'required|max:6']);
    }

    public function search($code)
    {
        ddd();

        if(!($this->code))
        {         
            $this->messageClass = "alert alert-danger";
            $this->message = "Unesite prezime klijenta"; 
            $this->order = null;  
        } 
    }

    public function render()
    {
        return view('livewire.check-status');
    }
}
