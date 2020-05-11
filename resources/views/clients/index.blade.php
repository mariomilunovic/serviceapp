@extends('layouts.master')

@section('content')

<div class="container">
    
    
    <h2>Prikaz svih klijenata</h2>
    <hr>
    
    <div class="row">
        <div class="col-md-10">
            <table class="table table-bordered table-striped table-hover">
                <tr class="info">
                    <th>Ime klijenta</th>
                    <th>Prezime klijenta</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th></th>
                    @if(Auth::user()->hasRole('administrator'))
                    <th></th>
                    @endif
                </tr>
                
                @foreach ($clients as $client)
                
                <tr>
                    
                    <td>{{$client->firstname}}</td>
                    <td>{{$client->lastname}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->tel}}</td>                        
                    
                    {{-- EDIT --}}      
                    <td>
                        <a href="{{route('clients.edit',$client->id)}}"><button class="alert btn btn-primary">Izmeni</button></a>
                        {{-- <td><a href="/clients/{{$client->id}}/edit"><button class="alert btn btn-primary">Izmeni</button></a></td>                                      --}}
                        {{-- <td><a href="/clients/{{$client->id}}/destroy"><button class="alert btn btn-danger">Obriši</button></a></td>   --}}                    
                    </td>
                    
                     {{-- DELETE --}}     
                     @if(Auth::user()->hasRole('administrator'))

                     
                    <td>        
                        {!! Form::open(['action' => ['ClientController@destroy',$client->id],'method'=>'delete']) !!}                        
                        @csrf                       
                        {!! Form::submit('Obriši',['class'=>'alert btn btn-danger btn-block']) !!}      
                        {!! Form::close() !!}   
                    </td>
                    @endif
                    
                </tr>                    
                
                @endforeach
                
            </table>
            {{$clients->links()}}
        </div>
    </div>
    
    @endsection