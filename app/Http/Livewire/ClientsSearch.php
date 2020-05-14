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
    
    public function mount() // podesava inicijalne parametre za view
    {        
         $this->clients = null;
    }
    
    //naziv funkcije je uskladjen sa nazivom bindovane promenljive $query
    public function updatedQuery()
    {
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
