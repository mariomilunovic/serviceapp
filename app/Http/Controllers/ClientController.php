<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('updated_at','desc')->paginate(5);
        return view('clients.index')->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'tel' => 'required'
        ]);

        $client = new Client;
        $client->firstname = $request->input('firstname');
        $client->lastname = $request->input('lastname');
        $client->email = $request->input('email');
        $client->tel = $request->input('tel');
        $client->save();

        return redirect ('/clients')->with('success','Klijent je uspešno unet');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit')->with('client',$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       // ddd($request);
        $this->validate($request,[
             'firstname' => 'required',
             'lastname' => 'required',
             'email' => 'required|email',
             'tel' => 'required'
         ]);

         $client = Client::find($id);
         $client->firstname = $request->input('firstname');
         $client->lastname = $request->input('lastname');
         $client->email = $request->input('email');
         $client->tel = $request->input('tel');
         $client->save();

         return redirect ('/clients')->with('success','Izmena uspešna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $client = Client::find($id);
        $client->delete();

        return redirect ('/clients')->with('success','Klijent je obrisan');
    }
}
