@extends('layouts.master')

@section('content')

<div class="container">
    
    
    <h2>Izmena podataka o klijentu</h2>
    <hr>
    <div class="row">
        <div class="col-5">
            
            {!! Form::open(['action' => ['ClientController@update',$client->id],'method'=>'put']) !!}
            
            @csrf
            
            <div class="form-group">
                {{Form::label('firstname','Ime')}}
                {{Form::text('firstname',$client->firstname,['class' => 'form-control','placeholder'=>'Unesi ime klijenta'])}}        
            </div>
            
            <div class="form-group">
                {{Form::label('lastname','Prezime')}}
                {{Form::text('lastname',$client->lastname,['class' => 'form-control','placeholder'=>'Unesi prezime klijenta'])}}        
            </div>
            
            <div class="form-group">
                {{Form::label('email','Email')}}
                {{Form::text('email',$client->email,['class' => 'form-control','placeholder'=>'Unesi email adresu klijenta'])}}        
            </div>
            
            <div class="form-group">
                {{Form::label('tel','Telefon')}}
                {{Form::text('tel',$client->tel,['class' => 'form-control','placeholder'=>'Unesi broj telefona klijenta'])}}        
            </div>            
            
            {!! Form::submit('Potvrdi izmene',['class'=>'btn btn-primary btn-block']) !!}             
            {!! Form::close() !!}  
            
            <br>  
            
            <a href="/clients" class="btn btn-danger btn-block float-right" role="button">Odustani</a>

        </div>
    </div>
</div>

@endsection