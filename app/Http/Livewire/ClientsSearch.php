<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\CLient;

class ClientsSearch extends Component
{
    
    public $clients = [];
    public $query;
    public $message = "";
    public $messageClass = "";
    
    public function mount() // mount se pokreće čim se komponenta učita
    {        
         $this->clients = null;
         
    }
    
    
    public function updated($query)
    {
         $this->validate(['query'=>'max:6']);

        if(!($this->query))
        {         
            $this->messageClass = "alert alert-danger";
            $this->message = "Unesite prezime klijenta"; 
            $this->clients = null;  
        }    
        else
        {
            sleep(1);// stavljeno radi simuliranja loading animacije
            $queryResult = Client::where('lastname','like','%'.$this->query.'%')->get();
            if(!count($queryResult )>0)
            {
                $this->messageClass = "alert alert-danger";
                $this->message = "Ne postoji ni jedan klijent sa unetim prezimenom";
                $this->clients = null;  
            }
            else
            {
                $this->messageClass = "alert alert-success";
                $this->clients = $queryResult ;
                $this->message = "Ukupan broj pronađenih klijenata: ".count($queryResult );
            }
        }
    }
    
    
    
    public function render()
    {
        return view('livewire.clients-search');
    }
}
