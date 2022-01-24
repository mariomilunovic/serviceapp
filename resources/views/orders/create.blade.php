@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col">
            <h2>Unos novog servisnog naloga</h2>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col">
            {!! Form::open(['route' => 'orders.store','method'=>'post']) !!}
            @csrf

            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        {{Form::label('client_id','Klijent : ',['class'=>'col-form-label'])}}
                    </div>
                    <div class="col-md-6">
                        <select name="client_id" id="client_id" class="form-control">
                            @foreach($clients as $client )
                            <option value="{{ $client->id }}">{{ $client->firstname }}  {{ $client->lastname }} | {{ $client->tel }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('clients.create')}}"><input type="button" class="btn btn-success btn-block" value="Novi klijent"></a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        {{Form::label('device_id','Uređaj :',['class'=>'col-form-label'])}}
                    </div>
                    <div class="col-md-6">
                        <select name="device_id" id="device_id" class="form-control">
                            @foreach($devices as $device )
                            <option value="{{ $device->id }}">{{ $device->brand }}  {{ $device->model }} | S/N: {{ $device->serial }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('devices.create')}}"><input type="button" class="btn btn-success btn-block" value="Novi uređaj"></a>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        {{Form::label('problem_description','Opis kvara :',['class'=>'col-form-label'])}}
                    </div>
                    <div class="col-md-6">
                        <textarea class="form-control" rows="2" id="problem_description" name="problem_description" placeholder="Unesi opis kvara"></textarea>

                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        {{Form::label('internal_comment','Interni komentar :',['class'=>'col-form-label'])}}
                    </div>
                    <div class="col-md-6">
                        <textarea class="form-control" rows="2" id="internal_comment" name="internal_comment" placeholder="Unesi interni komentar"></textarea>
                    </div>
                </div>
            </div>
            <br>
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
