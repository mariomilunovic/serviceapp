<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Collection;
use App\Client;
use App\Order;

class OrdersSearch extends Component
{


    public $orders = [];
    public $lastname;
    public $queryResult = [];

    public $message = "";
    public $messageClass = "";


public function updated($lastname)
{
    $this->validate(['lastname'=>'max:20']);

    $queryResult = [];

    if(!($this->lastname))
    {
        $this->messageClass = "alert alert-danger";
        $this->message = "Unesite prezime";
        $this->orders = null;
    }
    else
    {
        //sleep(1);// stavljeno radi simuliranja loading animacije
        $clients = Client::where('lastname','like','%'.$this->lastname.'%')->get();

        //ddd($clients->first());
        if(count($clients)==1)
        {
            $client = $clients->first();
            $queryResult = $client->orders()->get();
            //ddd($queryResult);
        }


        else
        {
            $queryResult = [];
        }


        if(!count($queryResult)>0)
        {
            $this->messageClass = "alert alert-danger";
            $this->message = "Unesite još karaktera";
            $this->orders = null;
        }
        else
        {
            $this->messageClass = "alert alert-success";
            $this->orders = $queryResult ;
            $this->message = "Ukupan broj pronađenih radnih naloga: ".count($queryResult );
        }
    }
}



    public function render()
    {
        return view('livewire.orders-search');
    }
}
