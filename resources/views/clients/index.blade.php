@extends('layouts.master')

@section('content')

<div class="container">
    
    
    <h2>Prikaz svih klijenata</h2>
   
    
    <div class="row">
        <div class="col-md">
            <table class="table table-bordered table-sm table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Ime klijenta</th>
                        <th>Prezime klijenta</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th></th>
                        {{-- @if(Auth::user()->hasRole('administrator'))
                        <th></th>
                        @endif --}}
                    </tr>
                </thead>
                
                @foreach ($clients as $client)
                
                <tr>
                    
                    <td>{{$client->firstname}}</td>
                    <td>{{$client->lastname}}</td>
                    <td><a href="mailto:{{$client->email}}">{{$client->email}}</a></td>
                    <td>{{$client->tel}}</td>          
                    
                     {{-- SHOW --}}      
                    <td><a href="{{route('clients.show',$client->id)}}"><button class="alert btn btn-primary btn-block">Detalji</button></a></td>  
                    
                    {{-- EDIT --}}      
                    {{-- <td><a href="{{route('clients.edit',$client->id)}}"><button class="alert btn btn-primary btn-block">Izmeni</button></a></td>                       --}}
                        
                    {{-- DELETE --}}     
                    {{-- @if(Auth::user()->hasRole('administrator'))
                        
                        <td>        
                            {!! Form::open(['route' => ['clients.destroy',$client->id],'method'=>'delete']) !!}                        
                            @csrf                       
                            {!! Form::submit('Obriši',['class'=>'alert btn btn-danger btn-block']) !!}      
                            {!! Form::close() !!}   
                        </td>
                        
                    @endif --}}
                        
                    </tr>                    
                    
                    @endforeach
                    
                </table>
                {{$clients->links()}}
            </div>
           
        </div>
      
        
        @endsection