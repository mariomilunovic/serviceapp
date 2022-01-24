@extends('layouts.master')



@section('content')

<div class="container">
    
    
    <h2>Pretraga servisnih naloga</h2>
    <hr>
    
    <div>
        
        @livewire('orders-search')
        
    </div>

</div>

@endsection