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
        $this->validate(['code'=>'required|max:13']);        
        $this->message = ""; 
        $this->order = null; 
    }

    public function search($code)
    {
        if(!($this->code) or strlen($this->code)<13)
        {
            $this->messageClass = "alert alert-danger";
            $this->message = "Morate uneti šifru od 13 karaktera"; 
            $this->clienorderts = null;

        }
        else
        {
            sleep(1);// stavljeno radi simuliranja loading animacije
            $queryResult = Order::where('access_code',$this->code)->first();
            if(!$queryResult)
            {
                $this->messageClass = "alert alert-danger";
                $this->message = "Ne postoji ni jedan nalog za dati unos";
                $this->order = null;  
            }
            else
            {
                $this->messageClass = "alert alert-success";
                $this->order = $queryResult ;
                $this->message = "Servisni nalog je pronađen";
            }
        }
        
        
    }
     
    // public function updated($code)
    // {
    //      $this->validate(['code'=>'required|max:13']);

    //     if(!($this->code))
    //     {         
    //         $this->messageClass = "alert alert-danger";
    //         $this->message = "Unesite prezime klijenta"; 
    //         $this->order = null;  
    //     }    
    //     else
    //     {
    //         sleep(1);// stavljeno radi simuliranja loading animacije
    //         $queryResult = Order::where('access_code','like','%'.$this->code.'%')->first();
    //         if(!count($queryResult )>0)
    //         {
    //             $this->messageClass = "alert alert-danger";
    //             $this->message = "Ne postoji ni jedan klijent sa unetim prezimenom";
    //             $this->order = null;  
    //         }
    //         else
    //         {
    //             $this->messageClass = "alert alert-success";
    //             $this->order = $queryResult ;
    //             $this->order = "Ukupan broj pronađenih klijenata: ".count($queryResult );
    //         }
    //     }
    // }
    
    
    
    public function render()
    {
        return view('livewire.check-status');
    }
}

