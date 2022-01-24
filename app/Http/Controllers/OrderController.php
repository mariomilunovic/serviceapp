<?php

namespace App\Http\Controllers;

use App\Order;
use App\Client;
use App\Device;
use App\Status;
use Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    
        public function validateOrder()
        {
        
        return  request()->validate([
            'client_id' => 'required',
            'device_id' => 'required',
            'status_id'=> 'nullable',
            'user_id'=> 'nullable',
            'access_code'=>'nullable',
            'problem_description' => 'required',
            'time_spent' => 'nullable',   
            'payment_status' => 'nullable',         
            'internal_comment' => 'nullable|max:255',
            'public_comment' => 'nullable|max:255'
            ]);
            
        }
        
        
        public function status()
        {
            return view ('orders.status'); //Livewire
        }
        
        public function search()
        {
            return view ('orders.search'); //Livewire
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
        }
        
        
        public function show($id)
        {
            $order = Order::find($id);
            return view ('orders.show')->with('order',$order);
        }
        
        
        public function edit(Order $order)
        {
            
            $statuses = Status::where('name','!=','izdat')->get(); //status 'izdat' će moći da se postavi samo iz blagajne
            //ddd($order);
            return view('orders.edit')->with(['order'=>$order,'statuses'=>$statuses]);
        }
        
        
        public function update(Request $request, Order $order)
        {
            //ddd($request);     
            //ddd($this->validateOrder());
            
            //$order->update($this->validateOrder());
            
            
            $order->time_spent = $request->time_spent;
            $order->update($this->validateOrder());
            
            
            //return redirect(route('orders.show'))->with(['success'=>'Izmena uspešna','id'=>$order->id]);
            return view('orders.show')->with(['success'=>'Izmena uspešna','order'=>$order]);
            return redirect(route('orders.index'))->with('success','Izmena uspešna');
            
        }
        
        
        public function destroy($id)
        {
            $order = Order::findOrFail($id);
            
            $order->delete();
            return redirect(route('orders.index'))->with('success','Servisni nalog je obrisan');
            
        }
        
        public function pay()
        {
            $orders = Order::where('status_id','3')->paginate(5);
            return view ('orders.pay')->with('orders',$orders);
        }
        
    } 
    