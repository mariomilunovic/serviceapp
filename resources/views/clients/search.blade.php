@extends('layouts.master')

@section('content')

<div class="container">
    
    <br><br>
    <h2>Pretraga klijenata</h2>
    <hr>
    
    {{-- <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered table-striped table-hover">
                <tr class="info">
                    <th>Ime klijenta</th>
                    <th>Prezime klijenta</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th></th>
                    <th></th>
                </tr>
                
                @foreach ($clients as $client)
                                                    
                    <tr>
                        <td>{{$client->firstname}}</td>
                        <td>{{$client->lastname}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->tel}}</td>      
                        <td><a href="/clients/update/{{$client->id}}"><button class="alert btn btn-primary">Izmeni</button></a></td>                                     
                        <td><a href="/clients/destroy/{{$client->id}}"><button class="alert btn btn-danger">Obriši</button></a></td>     
                    </tr>                    
                
                @endforeach
                
            </table>
        </div>
    </div> --}}
    
    @endsection