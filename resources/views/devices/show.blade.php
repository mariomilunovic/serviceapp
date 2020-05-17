@extends('layouts.master')



@section('content')

<div class="container">
    
    <h2>Informacije o uređaju</h2>
    <hr>
    
    <div class="row">
        <div class="col-md-7">
            
            <table class="table table-bordered table-sm table-striped table-hover">
                
                <tr>
                    <td class="col-md-2">Proizvođač</td>
                    <td class="col-md-7">{{$device->brand}} </td>
                    
                </tr>
                <tr>
                    <td>Model</td> 
                    <td>{{$device->model}} </td>
                </tr>
                <tr>
                    <td>Serijski broj</td> 
                    <td>{{$device->serial}} </td>
                </tr>
                <tr>
                    <td>Opis</td>
                    <td>{{$device->description}} </td>
                </tr>
                <tr>
                    <td>Kreiran</td>
                    <td> {{Carbon\Carbon::parse($device->created_at)->diffForHumans()}} ({{$device->updated_at}})
                    </td>  
                </tr>                
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            {{-- EDIT --}}  
            <a href="{{route('devices.edit', $device)}}"><button class="alert btn btn-primary btn-block">Izmeni</button></a>
            <br>
            {{-- DELETE --}}     
            @if(Auth::user()->hasRole('administrator'))
            
            <td>        
                {!! Form::open(['route' => ['devices.destroy',$device->id],'method'=>'delete']) !!}                        
                @csrf                       
                {!! Form::submit('Obriši',['class'=>'alert btn btn-danger btn-block']) !!}      
                {!! Form::close() !!}   
            </td>
            
            @endif
        </div>
    </div>

</div>

@endsection