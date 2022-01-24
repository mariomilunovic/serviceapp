@extends('layouts.master')



@section('content')

    <div class="container">

        <h2>Informacije o korisniku</h2>
        <hr>

        <div class="row">
            <div class="col-md-7">

                <table class="table table-bordered table-sm table-striped table-hover">

                    <tr>
                        <td class="col-md-2">Ime</td>
                        <td class="col-md-7">{{$user->name}} </td>

                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$user->email}} </td>
                    </tr>
                    <tr>
                        <td>Uloga</td>
                        <td>{{$user->roles->first()->name}} </td>
                    </tr>

                    <tr>
                        <td>Kreiran</td>
                        <td> {{Carbon\Carbon::parse($user->created_at)->diffForHumans()}} ({{$user->created_at}})
                        </td>
                    </tr>

                    <tr>
                        <td>Ažuriran</td>
                        <td> {{Carbon\Carbon::parse($user->updated_at)->diffForHumans()}} ({{$user->updated_at}})
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                {{-- EDIT --}}
                <a href="{{route('users.edit', $user)}}"><button class="alert btn btn-primary btn-block">Izmeni</button></a>
                <br>
                {{-- DELETE --}}
                @if(Auth::user()->hasRole('administrator'))

                    <td>
                        {!! Form::open(['route' => ['users.destroy',$user->id],'method'=>'delete']) !!}
                        @csrf
                        {!! Form::submit('Obriši',['class'=>'alert btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </td>

                @endif
            </div>
        </div>

    </div>

@endsection
