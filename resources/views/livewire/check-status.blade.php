<div>
    
    <div class="form-group row">
        <label for="code" class="col-sm-2 col-form-label">Šifra za proveru statusa :</label>
        <div class="col-sm-4">
            <input type="text" wire:model.debounce.150ms="code" class="form-control" id="code" placeholder="Unesite šifru sa potvrde o prijemu">
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

    
</div>

@if($message)
<span class="{{$messageClass}}">{{$message}}</span>    
@endif
<br><br>
    
    
    
    