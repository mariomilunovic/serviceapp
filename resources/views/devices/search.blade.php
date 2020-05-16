@extends('layouts.master')



@section('content')

<div class="container">
    
    
    <h2>Pretraga uređaja</h2>
    <hr>
    
    <div>
        
        @livewire('devices-search')
        
    </div>

</div>

@endsection