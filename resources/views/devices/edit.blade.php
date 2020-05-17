@extends('layouts.master')

@section('content')

<div class="container">
    
    
    <h2>Izmena podataka o uređaju</h2>
    <hr>
    <div class="row">
        <div class="col-5">

            {!! Form::open(['route' => ['devices.update',$device->id],'method'=>'put']) !!} 
            @csrf
            
            <div class="form-group">
                {{Form::label('brand','Marka')}}
                {{Form::text('brand',$device->brand,['class' => 'form-control','placeholder'=>'Unesi marku uređaja'])}}        
            </div>
            
            <div class="form-group">
                {{Form::label('model','Model')}}
                {{Form::text('model',$device->model,['class' => 'form-control','placeholder'=>'Unesi model uređaja'])}}        
            </div>
            
            <div class="form-group">
                {{Form::label('serial','Serijski broj')}}
                {{Form::text('serial',$device->serial,['class' => 'form-control','placeholder'=>'Unesi serijski broj uređaja'])}}        
            </div>
            
            <div class="form-group">
                {{Form::label('description','Opis')}}
                {{Form::text('description',$device->description,['class' => 'form-control','placeholder'=>'Unesi opis uređaja'])}}        
            </div>            
            
            {!! Form::submit('Unesi',['class'=>'btn btn-primary btn-block']) !!}  
            {!! Form::close() !!}    
            
            <br>
            
            <a href="{{route('devices.show',$device->id)}}" class="btn btn-danger btn-block float-right" role="button">Odustani</a>

        </div>
    </div>
</div>

@endsection