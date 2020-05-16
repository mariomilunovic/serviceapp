@extends('layouts.master')

@section('content')

<div class="container">
    
    
    <h2>Unos novog uređaja</h2>
    <hr>
    <div class="row">
        <div class="col-5">
            {!! Form::open(['route' => 'devices.store','method'=>'post']) !!}      
            @csrf
            
            <div class="form-group">
                {{Form::label('brand','Marka')}}
                {{Form::text('brand','',['class' => 'form-control','placeholder'=>'Unesi marku uređaja'])}}        
            </div>
            
            <div class="form-group">
                {{Form::label('model','Model')}}
                {{Form::text('model','',['class' => 'form-control','placeholder'=>'Unesi model uređaja'])}}        
            </div>
            
            <div class="form-group">
                {{Form::label('serial','Serijski broj')}}
                {{Form::text('serial','',['class' => 'form-control','placeholder'=>'Unesi serijski broj uređaja'])}}        
            </div>
            
            <div class="form-group">
                {{Form::label('description','Opis')}}
                {{Form::text('description','',['class' => 'form-control','placeholder'=>'Unesi opis uređaja'])}}        
            </div>            
            
            {!! Form::submit('Unesi',['class'=>'btn btn-primary btn-block']) !!}  
            {!! Form::close() !!}    
            
            <br>
            
            <a href="/clients" class="btn btn-danger btn-block float-right" role="button">Odustani</a>

        </div>
    </div>
</div>

@endsection