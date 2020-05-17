@extends('layouts.master')

@section('content')

<div class="container">
    
    
    <h2>Servisni nalog ID {{$order->id}}</h2>
    
    <div class="row">
        <div class="col">
            
            <table class="table table-bordered table-sm table-striped table-hover">
                
                <tr>
                    <td>Kreirao</td>
                    <td><strong>{{$order->user->name}} </strong>{{Carbon\Carbon::parse($order->created_at)->diffForHumans()}} ({{$order->created_at}})</td>
                    
                </tr>
                <tr>
                    <td>Klijent</td> 
                    <td>{{$order->client->firstname}}  {{$order->client->lastname}} <br><a href="mailto:{{$order->client->email}}">{{$order->client->email}}</a>  <br> <small>TEL: {{$order->client->tel}}</small>  </td>
                </tr>
                <tr>
                    <td>Uređaj</td>
                    <td>
                        {{$order->device->brand}} <strong>{{$order->device->model}} </strong><br>
                        <small>S/N:  {{$order->device->serial}}</small> <br>
                    </td>
                </tr>
                <tr>
                    <td>Opis kvara</td>
                    <td>{{$order->problem_description}} </td>
                </tr>
                <tr>
                    <td>Status obrade</td>
                    <td><strong>{{$order->status->name}}</strong> <small>ažuriran 
                        {{Carbon\Carbon::parse($order->created_at)->diffForHumans()}}</small> ({{$order->updated_at}})
                    </td>  
                </tr>
                <tr>
                    <td>Status plaćanja</td>  
                    @if($order->payment_status)
                    <td class="text-success"><strong>PLAĆEN</strong>  </td> 
                    @else
                    <td class="text-danger"><strong>NIJE PLAĆEN</strong> </td>  
                    @endif
                </tr>
                <tr>
                    <td>Šifra za proveru statusa</td>
                    <td>{{$order->access_code}}</td>  
                </tr>
                <tr>
                    <td>Utrošeno vreme</td>
                    <td>{{$order->time_spent}} radnih sati</td> 
                </tr>
                <tr>
                    <td>Javni komentar</td>
                    <td>{{$order->public_comment}}</td> 
                </tr>
                
                <tr>
                    <td>Interni komentar</td>
                    <td>{{$order->internal_comment}}</td> 
                    
                </tr>
                
            </table>
        </div>

        
        
    </div>
    <div class="row">
        <div class="col-md-3">
            {{-- EDIT --}}                          
            <a href="{{route('orders.edit',$order->id)}}"><button class="alert btn btn-primary btn-block">Izmeni</button></a>                    
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-3">   
            {{-- DELETE --}}  
            {!! Form::open(['route' => ['orders.destroy',$order->id],'method'=>'delete']) !!}                        
            @csrf                       
            {!! Form::submit('Obriši',['class'=>'alert btn btn-danger btn-block']) !!}      
            {!! Form::close() !!}                    
            
        </div>
    </div>
    @endsection