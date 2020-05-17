<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function validateDevice()
    {
       return  request()->validate([  
           'brand' => 'required',
           'model' => 'required',
           'serial' => 'required',
           'description' => 'required'
       ]);
    }

    public function search()
    {
        return view ('devices.search');
    }

    public function index()
    {
        $devices = Device::orderBy('updated_at','desc')->paginate(8);
        return view ('devices.index')->with('devices',$devices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Device::create($this->validateDevice());
        return redirect(route('devices.index'))->with('success','Uređaj je uspešno unet');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deviceToBeDeleted = Device::find($id);

        if($deviceToBeDeleted->orders->count()>0)
        {
            return redirect(route('devices.index'))->with('error','Uređaj ne može biti obrisan jer postoje vezani servisni nalozi');
        }
        else
        {
            $deviceToBeDeleted->delete();
            return redirect(route('devices.index'))->with('success','Uređaj je obrisan');
        }
    }
        
}
