<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $count = 22;

    public function increment()
    {
$this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }
    public function render()
    {
        return view('livewire.test');
    }
}
