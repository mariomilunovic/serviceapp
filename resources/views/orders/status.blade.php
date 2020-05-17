@extends('layouts.app')

@section('content')

<div class="container">
    
    <h2>Provera statusa servisa</h2>
    <hr>
    
    <div>        
        @livewire('check-status')    
    </div>
</div>

@endsection