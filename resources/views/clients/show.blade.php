@extends('layouts.master')



@section('content')

<div class="container">
    
    <h2>Informacije o klijentu</h2>
    <hr>
    
    <div class="row">
        <div class="col-md-5">
            
            <table class="table table-bordered table-sm table-striped table-hover">
                
                <tr >
                    <td class="col-md-3">Ime</td>
                    <td>{{$client->firstname}} </td>
                    
                </tr>
                <tr>
                    <td>Prezime</td> 
                    <td>{{$client->lastname}} </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><a href="mailto:{{$client->email}}">{{$client->email}}</a></td>
                </tr>
                <tr>
                    <td>Telefon</td>
                    <td>{{$client->tel}} </td>
                </tr>
                <tr>
                    <td>Kreiran</td>
                    <td> {{Carbon\Carbon::parse($client->created_at)->diffForHumans()}}  ({{$client->updated_at}})
                    </td>  
                </tr>                
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            {{-- EDIT --}}  
            <a href="{{route('clients.edit',$client->id)}}"><button class="alert btn btn-primary btn-block">Izmeni</button></a>
            <br>
            {{-- DELETE --}}     
            @if(Auth::user()->hasRole('administrator'))
            
            <td>        
                {!! Form::open(['route' => ['clients.destroy',$client->id],'method'=>'delete']) !!}                        
                @csrf                       
                {!! Form::submit('Obriši',['class'=>'alert btn btn-danger btn-block']) !!}      
                {!! Form::close() !!}   
            </td>
            
            @endif
        </div>
    </div>

</div>

@endsection