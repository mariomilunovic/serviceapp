<div>
    
    <div class="form-group row">
        <label for="code" class="col-sm-2 col-form-label">Šifra za proveru statusa :</label>
        <div class="col-sm-4">
            <input type="text" wire:model="code" class="form-control" id="code" placeholder="Unesite šifru sa potvrde o prijemu">
        </div>
        <div class="col-md-2">  
            <input type="button" wire:click="search" class="btn btn-success btn-block" value="Traži">                        
        </div>
        <div wire:loading class="cssload-container col-sm-1">
            <div class="cssload-speeding-wheel"></div>
        </div>
        @error('code') <span>{{$message}}</span>
        @enderror   
    </div>
    
    
    @if($message)
    <span class="{{$messageClass}}">{{$message}}</span>    
    @endif
    <br><br>
    
    
    
    @if(!empty($order))
    
    
        <h5>Servisni nalog ID {{$order->id}}</h5>
    
        <div class="row">
             <div class="col">
            
                  <table class="table table-bordered table-sm table-striped table-hover">
                
                      <tr>
                            <td>Kreirao</td>
                            <td><strong>{{$order->user->name}} </strong>| {{Carbon\Carbon::parse($order->created_at)->diffForHumans()}} |  ({{$order->created_at}})</td>                    
                      </tr>

                      <tr>
                          <td>Klijent</td> 
                          <td>{{$order->client->firstname}}  {{$order->client->lastname}} </td>
                      </tr>

                      <tr>
                          <td>Uređaj</td>
                          <td>
                              {{$order->device->brand}} <strong>{{$order->device->model}} </strong>
                              |<small>  S/N:  {{$order->device->serial}}</small> <br>
                          </td>
                      </tr>

                      <tr>
                          <td>Opis kvara</td>
                          <td>{{$order->problem_description}} </td>
                      </tr>

                      <tr>
                    <td>Status obrade</td>
                    <td><strong>{{$order->status->name}}</strong> | <small>ažuriran 
                        {{Carbon\Carbon::parse($order->created_at)->diffForHumans()}}</small> | ({{$order->updated_at}})
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
                    <td>Utrošeno vreme</td>
                    <td>{{$order->time_spent}} radnih sati</td> 
                </tr>
                
                <tr>
                    <td>Izveštaj servisera</td>
                    <td>{{$order->public_comment}}</td> 
                </tr>
              
                
            </table>
        </div>
        
        
        
        @endif
        
    </div>
    
    
    
    