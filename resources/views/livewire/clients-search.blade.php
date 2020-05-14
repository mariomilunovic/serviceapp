<div>
    
    <div class="form-group row">
        <label for="query" class="col-sm-1 col-form-label">Prezime</label>
        <div class="col-sm-3">
            <input 
            type="text"
            class="form-control"
            id="query"
            placeholder="Unesite prezime"
            wire:model.debounce.150ms="query" 
            wire.keydown="search" 
            />
        </div>
       
        <div wire:loading class="cssload-container col-sm-1">
            <div class="cssload-speeding-wheel"></div>
        </div>
 
        {{-- <button wire:click="search" class="btn btn-primary">Pretraga</button> --}}
    </div>
    
 
   
    
    @if($message)
    <span class="{{$messageClass}}">{{$message}}</span>    
    @endif
    <br><br>
    
    
    
    <div class="row">
        <div class="col-md">
            @if(!empty($clients))
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Ime klijenta</th>
                        <th>Prezime klijenta</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th></th>
                        @if(Auth::user()->hasRole('administrator'))
                        <th></th>
                        @endif
                    </tr>
                </thead>
                
                @foreach ($clients as $client)
                
                <tr>
                    
                    <td>{{$client->firstname}}</td>
                    <td>{{$client->lastname}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->tel}}</td>                        
                    
                    {{-- EDIT --}}      
                    <td><a href="{{route('clients.edit',$client->id)}}"><button class="alert btn btn-primary btn-block">Izmeni</button></a></td>                      
                    
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
                
                @endif
                
            </table>
            
        </div>
        
    </div>
    
</div>
