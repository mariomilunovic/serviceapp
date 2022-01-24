@extends('layouts.master')

@section('content')

<div class="container-fluid">
    
    <div class="row">
        <div class="col">
        <h2>Obrada servisnog naloga ID {{$order->id}}</h2>
            <hr>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            {!! Form::open(['route' => ['orders.update',$order],'method'=>'put']) !!}
            @csrf
            
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        {{Form::label('client_id','Klijent : ',['class'=>'col-form-label'])}}
                    </div>
                    <div class="col-md-6">
                        <input type="hidden" id="client_id" name="client_id" value="{{$order->client_id}}">
                        <strong>{{$order->client()->first()->firstname}}
                            {{$order->client()->first()->lastname}}</strong> |
                            <small>   TEL: {{$order->client()->first()->tel}}</small>
                            
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            {{Form::label('device_id','Uređaj :',['class'=>'col-form-label'])}}
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" id="device_id" name="device_id" value="{{$order->device_id}}">
                            <strong>{{$order->device()->first()->brand}}</strong> 
                            {{$order->device()->first()->model}} |
                            <small>   S/N: {{$order->device()->first()->serial}}</small>
                            
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            {{Form::label('problem_description','Opis kvara :',['class'=>'col-form-label'])}}
                        </div>
                        <div class="col-md-6">
                            <textarea class="form-control" rows="1" id="problem_description" name="problem_description" >{{$order->problem_description}} </textarea>
                            
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            {{Form::label('internal_comment','Interni komentar :',['class'=>'col-form-label'])}}
                        </div>
                        <div class="col-md-6">
                            <textarea class="form-control" rows="1" id="internal_comment" name="internal_comment" placeholder="Unesi interni komentar">{{$order->internal_comment}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            {{Form::label('public_comment','Javni  komentar :',['class'=>'col-form-label'])}}
                        </div>
                        <div class="col-md-6">
                            <textarea class="form-control" rows="1" id="public_comment" name="public_comment" placeholder="Unesi javni komentar">{{$order->public_comment}}</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            {{Form::label('status_id','Status :',['class'=>'col-form-label'])}}   
                        </div>
                        <div class="col-md-2">
                            <select name="status_id" id="status_id" class="form-control">
                                @foreach($statuses as $status )
                                <option value="{{$status->id}}" {{$order->status_id == $status->id?'selected':''}}>{{$status->name}} </option>
                                @endforeach
                            </select>
                        </div>   
                        
                        <div class="col-md-2">
                            {{Form::label('time_spent','Broj radnih sati :',['class'=>'col-form-label'])}}   
                        </div>
                        <div class="col-md-2">
                        <input class="form-control" type="number" id="time_spent" name="time_spent" step="1" min="0" value="{{$order->time_spent}}">
                        </div>   
                    </div> 
                </div> 

                
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            {!! Form::submit('Unesi',['class'=>'btn btn-primary btn-block']) !!}
                        </div>
                        <div class="col-md-2">
                            
                        </div>
                        <div class="col-md-3">
                            <a href="/orders" class="btn btn-danger btn-block float-right" role="button">Odustani</a>
                        </div>
                    </div>
                </div>
                
                {!! Form::close() !!}
                
            </div>
            
        </div>
    </div>
    
    @endsection
    