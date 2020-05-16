<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Device;

class DevicesSearch extends Component
{
    
    public $devices = [];
    public $query;
    public $message = "";
    public $messageClass = "";
    
    public function mount() // mount se pokreće čim se komponenta učita
    {        
         $this->devices = null;
         
    }
    
    
    public function updated($query)
    {
         $this->validate(['query'=>'max:6']);

        if(!($this->query))
        {         
            $this->messageClass = "alert alert-danger";
            $this->message = "Unesite serijski broj uređaja"; 
            $this->devices = null;  
        }    
        else
        {
            //sleep(1);// stavljeno radi simuliranja loading animacije
            $queryResult = Device::where('serial','like','%'.$this->query.'%')->get();
            if(!count($queryResult )>0)
            {
                $this->messageClass = "alert alert-danger";
                $this->message = "Ne postoji ni jedan uređaj sa unetim serijskim brojem";
                $this->devices = null;  
            }
            else
            {
                $this->messageClass = "alert alert-success";
                $this->devices = $queryResult ;
                $this->message = "Ukupan broj pronađenih uređaja: ".count($queryResult );
            }
        }
    }
        
    
    public function render()
    {
        return view('livewire.devices-search');
    }
}
