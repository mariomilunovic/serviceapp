@extends('layouts.master')



@section('content')

<div class="container">
    
    
    <h2>Pretraga klijenata</h2>
    <hr>
    
    <div>
        
        @livewire('clients-search')
        
    </div>

</div>

@endsection