@extends('layouts.master')

@section('content')

<div class="container">
    
    
    <h2>Izmena korisnika</h2>
    <hr>
    <div class="row">
        <div class="col">
            {!! Form::open(['route' => ['users.update',$user],'method'=>'put']) !!}      
            @csrf
            
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1">
                        {{Form::label('name','Ime :',['class'=>'col-form-label'])}}   
                    </div>
                    <div class="col-md-4">
                        {{Form::text('name',$user->name,['class' => 'form-control','placeholder'=>'Unesi ime i prezime korisnika'])}}   
                    </div>                    
                </div> 
            </div>     
            
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1">
                        {{Form::label('email','Email :',['class'=>'col-form-label'])}}   
                    </div>
                    <div class="col-md-4">
                       <div class="col-form-label">{{$user->email}}</div> 
                        <input type="hidden" id="email" name="email" value="{{$user->email}}">
                        {{-- {{Form::text('email',$user->email,['class' => 'form-control','placeholder'=>'Unesi email adresu'])}}    --}}
                    </div>                    
                </div> 
            </div>  
            
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1">
                        {{Form::label('password','Lozinka :',['class'=>'col-form-label'])}}   
                    </div>
                    <div class="col-md-4">
                        {{Form::text('password',$user->password,['class' => 'form-control','placeholder'=>'Unesi lozinku'])}}   
                    </div>                    
                </div> 
            </div> 
            
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1">
                        {{Form::label('role_id','Uloga :',['class'=>'col-form-label'])}}   
                    </div>
                    <div class="col-md-4">
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach($roles as $role )
                            <option value="{{$role->id}}"{{$role->id == $user->roles()->first()->id ?'selected':''}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>                    
                </div> 
            </div> 
            
            
            <div class="row">
                <div class="col-md-5">
                    {!! Form::submit('Izmeni',['class'=>'btn btn-primary btn-block']) !!}  
                    {!! Form::close() !!}
                    
                </div>                
            </div>

            <br>

            <div class="row">
                <div class="col-md-5">
                    <a href="{{route('users.index')}} "class="btn btn-danger btn-block float-right" role="button">Odustani</a>                    
                </div>                
            </div>   
                     
        </div>
    </div>
</div>

@endsection