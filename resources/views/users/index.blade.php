@extends('layouts.master')

@section('content')

<div class="container">
    
    
    <h2>Prikaz svih korisnika</h2>
    <hr>
    
    <div class="row">
        <div class="col-md-10">
            <table class="table table-bordered table-striped table-hover">
                <tr class="info">
                    <th>Ime korisnika</th>
                    <th>Email</th>                    
                    <th>Admin</th>
                    <th>Serviser</th>
                    <th>Neaktivan</th>
                    <th></th>
                    <th></th>
                </tr>
                
                @foreach ($users as $user)
                
                <tr>
                    
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>

                    <td style="width:50px">                     
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="role_administrator" id="role" {{ $user->hasRole('administrator') ? 'checked':''}}>
                            <label class="custom-control-label" for="role"></label>
                        </div>
                    </td>

                    <td style="width:50px">                      
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="role_serviser" id="role" {{ $user->hasRole('serviser') ? 'checked':''}}>
                            <label class="custom-control-label" for="role"></label>
                        </div>
                    </td>

                    <td style="width:50px">                     
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="role_neaktivan" id="role" {{ $user->hasRole('neaktivan') ? 'checked':''}}>
                            <label class="custom-control-label" for="role"></label>
                        </div>
                    </td>
   
                    
                    {{-- EDIT --}}      
                    <td>
                        <a href="{{route('users.edit',$user->id)}}"><button class="alert btn btn-primary">Izmeni</button></a>
                         {{--  <td><a href="/clients/{{$client->id}}/edit"><button class="alert btn btn-primary">Izmeni</button></a></td>                          
                                 <td><a href="/clients/{{$client->id}}/destroy"><button class="alert btn btn-danger">Obriši</button></a></td>  --}}
                    </td>
                    
                     {{-- DELETE --}}
                    <td>        
                        {!! Form::open(['action' => ['UserController@destroy',$user->id],'method'=>'delete']) !!}                        
                        @csrf                       
                        {!! Form::submit('Obriši',['class'=>'alert btn btn-danger btn-block']) !!}      
                        {!! Form::close() !!}   
                    </td> 
                    
                </tr>                    
                
                @endforeach
                
            </table>
            {{$users->links()}}
        </div>
    </div>
    
    @endsection