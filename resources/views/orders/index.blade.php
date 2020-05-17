@extends('layouts.master')

@section('content')

<div class="container">
    
    
    <h2>Pregled radnih naloga</h2>
        
    <div class="row">
        <div class="col-md">

            <table class="table table-bordered table-sm table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Primio na servis</th>
                        <th>Klijent</th>
                        <th>Uređaj</th>
                        <th>Status obrade</th>
                        <th>Status plaćanja</th>  
                        <th>Ažuriran</th>              
                        <th></th>
                                             
                    </tr>
                </thead>
                
                @foreach ($orders as $order)
                
                <tr>
                    
                    <td>{{$order->user->name}}</td>
                    <td>{{$order->client->firstname}}  {{$order->client->lastname}} <br> <small>TEL: {{$order->client->tel}}</small>  </td>
                    <td>
                        {{$order->device->brand}} <strong>{{$order->device->model}} </strong><br>
                        <small>S/N:  {{$order->device->serial}}</small> <br>
                    </td>
                    <td>{{$order->status->name}}</td>     

                    @if($order->payment_status)
                      <td class="text-success"><strong>PLAĆEN</strong>  </td> 
                    @else
                     <td class="text-danger"><strong>NIJE PLAĆEN</strong> </td>  
                    @endif

                    <td>{{Carbon\Carbon::parse($order->updated_at)->diffForHumans()}}</td>  

                    {{-- VIEW --}}      
                    <td><a href="{{route('orders.show',$order->id)}}"><button class="alert btn btn-primary btn-block">Detalji</button></a></td>  
                    
                    {{-- EDIT --}}      
                    {{-- <td><a href="{{route('orders.edit',$order->id)}}"><button class="alert btn btn-primary btn-block">Izmeni</button></a></td>                       --}}
                        
                    {{-- DELETE --}}     
                  
                        
                        {{-- <td>        
                            {!! Form::open(['route' => ['orders.destroy',$order->id],'method'=>'delete']) !!}                        
                            @csrf                       
                            {!! Form::submit('Obriši',['class'=>'alert btn btn-danger btn-block']) !!}      
                            {!! Form::close() !!}   
                        </td> --}}
                        
                 
                        
                    </tr>                    
                    
                    @endforeach
                    
                </table>
                {{$orders->links()}}
        </div>
        
    </div>
    @endsection