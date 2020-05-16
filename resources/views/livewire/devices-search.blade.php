<div>
    
    <div class="form-group row">
        <label for="query" class="col-sm-1 col-form-label">S/N</label>
        <div class="col-sm-3">
            <input 
            type="text"
            class="form-control"
            id="query"
            placeholder="Unesite serijski broj"
            wire:model.debounce.150ms="query" 
            wire.keydown="search" 
            />
        </div>      
        
        {{-- custom spinner --}}
        <div wire:loading class="cssload-container col-sm-1">
            <div class="cssload-speeding-wheel"></div>
        </div>
        
        @error('query') <span>{{$message}}</span>
        @enderror
                
    </div>
    
    @if($message)
    <span class="{{$messageClass}}">{{$message}}</span>    
    @endif
    <br><br>        
    
    <div class="row">
        <div class="col-md">
            @if(!empty($devices))
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Marka</th>
                        <th>Model</th>
                        <th>Serijski broj</th>
                        <th>Opis</th>
                        <th></th>
                        @if(Auth::user()->hasRole('administrator'))
                        <th></th>
                        @endif
                    </tr>
                </thead>
                
                @foreach ($devices as $device)
                
                <tr>
                    
                    <td>{{$device->brand}}</td>
                    <td>{{$device->model}}</td>
                    <td>{{$device->serial}}</td>                        
                    <td>{{$device->description}}</td>
                    
                    {{-- EDIT --}}      
                    <td><a href="{{route('devices.edit',$device->id)}}"><button class="alert btn btn-primary btn-block">Izmeni</button></a></td>                      
                    
                    {{-- DELETE --}}     
                    @if(Auth::user()->hasRole('administrator'))
                    
                    <td>        
                        {!! Form::open(['action' => ['DeviceController@destroy',$device->id],'method'=>'delete']) !!}                        
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
