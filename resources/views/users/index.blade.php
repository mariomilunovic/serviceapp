@extends('layouts.master')

@section('content')

<div class="container">
    
    
    <h2>Prikaz svih korisnika</h2>
    <hr>
    
    <div class="row">
        <div class="col-md-10">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                <tr class="info">
                    <th>Ime korisnika</th>
                    <th>Email</th>                    
                    <th class="text-center">Admin</th>
                    <th class="text-center">Serviser</th>
                    <th class="text-center">Neaktivan</th>
                    <th></th>
                   
                </tr>
            </thead>
                
                @foreach ($users as $user)
                
                <tr>
                    
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>

                    <td>
                        @if($user->hasRole('administrator'))                    
                            <div class="text-center">&#x2714</div>
                        @endif
                    </td>

                    <td>
                        @if($user->hasRole('serviser'))                    
                            <div class="text-center">&#x2714</div>
                        @endif
                    </td>

                    <td>
                        @if($user->hasRole('neaktivan'))                    
                            <div class="text-center">&#x2714</div>
                        @endif
                    </td>


                    {{-- CHECKBOX VERZIJA --}}

                    {{-- 
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
                    </td> --}}



                     {{-- SHOW --}}      
                     <td>
                        <a href="{{route('users.show',$user->id)}}"><button class="alert btn btn-primary btn-block">Detalji</button></a>
                         {{--  <td><a href="/clients/{{$client->id}}/edit"><button class="alert btn btn-primary">Izmeni</button></a></td>                          
                                 <td><a href="/clients/{{$client->id}}/destroy"><button class="alert btn btn-danger">Obri??i</button></a></td>  --}}
                     </td>
                    

                    {{-- EDIT --}}      
                    {{-- <td>
                        <a href="{{route('users.edit',$user->id)}}"><button class="alert btn btn-primary">Izmeni</button></a>
                         {{--  <td><a href="/clients/{{$client->id}}/edit"><button class="alert btn btn-primary">Izmeni</button></a></td>                          
                                 <td><a href="/clients/{{$client->id}}/destroy"><button class="alert btn btn-danger">Obri??i</button></a></td>  --}}
                    
                    

                     {{-- DELETE --}}
                    {{-- <td>        
                        {!! Form::open(['action' => ['UserController@destroy',$user->id],'method'=>'delete']) !!}                        
                        @csrf                       
                        {!! Form::submit('Obri??i',['class'=>'alert btn btn-danger btn-block']) !!}      
                        {!! Form::close() !!}   
                    </td>  --}}
                    
                </tr>                    
                
                @endforeach
                
            </table>
            {{$users->links()}}
        </div>
    </div>
    
    @endsection