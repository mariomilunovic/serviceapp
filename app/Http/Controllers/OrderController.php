<?php

namespace App\Http\Controllers;

use App\Order;
use App\Client;
use App\Device;
use Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function validateOrder()
     {
        return  request()->validate([  
            'client_id' => 'required',
            'device_id' => 'required',
            'problem_description' => 'required',
            'internal_comment' => 'required'
        ]);
     }

     public function status()
     {
         return view ('orders.status'); //Livewire
     }

  
    public function index()
    {
        $orders = Order::orderBy('updated_at','desc')->paginate(5);
        return view ('orders.index')->with('orders',$orders);
    }


    public function create()
    {
        $clients = Client::orderBy('updated_at','desc')->get();
        $devices = Device::orderBy('updated_at','desc')->get();
        return view('orders.create')->with(['devices'=>$devices,'clients'=>$clients]);
    }

  
    public function store(Request $request)
    {
              
            $newOrder = $this->validateOrder();
            $newOrder += [
                'time_spent'=>'0',
                'user_id'=>Auth::user()->id,
                'access_code'=>uniqid(),
                'status_id'=>'1', //čeka na servis
                      
            
            ];
            Order::create($newOrder);
             return redirect(route('orders.index'))->with('success','Nalog je uspešno unet');

            ddd($newOrder);
        

        // Order::create($this->validateOrder());
    }

   
    public function show($id)
    {
        $order = Order::find($id);
        return view ('orders.show')->with('order',$order);
    }

 
    public function edit(Order $order)
    {
        //
    }

 
    public function update(Request $request, Order $order)
    {
        //
    }

  
    public function destroy(Order $order)
    {
        //
    }
}
