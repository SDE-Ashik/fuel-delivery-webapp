<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Jobs\SentMailToUserJob;
use Validator;
class AgentController extends Controller
{
    public function index()  {
        $orders = Order::select('orders.*','pumps.name as pump_name','pumps.email as pump_email','pumps.phone as pump_phone','pumps.location as pump_location','pumps.image as pump_image')
            ->where('delivery_agent',Auth::Id())
            ->leftJoin('pumps','pumps.id','=','orders.pump_id')
            ->where('status',2)->latest()->get();
        return view('delivery.index',compact('orders'));    
    }
    public function oldOrder()  {
        $orders = Order::select('orders.*','pumps.name as pump_name','pumps.email as pump_email','pumps.phone as pump_phone','pumps.location as pump_location','pumps.image as pump_image')
            ->where('delivery_agent',Auth::Id())
            ->leftJoin('pumps','pumps.id','=','orders.pump_id')
            ->where('status',3)->latest()->get();
        return view('delivery.old_order',compact('orders'));    
    }
    public function newOrder()  {
        $orders = Order::select('orders.*','pumps.name as pump_name','pumps.email as pump_email','pumps.phone as pump_phone','pumps.location as pump_location','pumps.image as pump_image')
            ->where('delivery_agent',null)
            ->leftJoin('pumps','pumps.id','=','orders.pump_id')
            ->where('status',1)->latest()->get();
        return view('delivery.new_order',compact('orders'));
    }
    public function acceptOrder($orderId) {
        $order = Order::find($orderId);
        $order->delivery_agent = Auth::Id();
        $order->otp = rand(999, 9999);
        $order->status =2;
        $order->save();
        SentMailToUserJob::dispatch(Auth::user(),$order,'ORDER ACCEPTED');
        return redirect()->back();
    }
    public function completeOrder($orderId)  {
        $order = Order::find($orderId);
        return view('delivery.otp',compact('order'));
    }
    public function verifyOtp(Request $request)  {
        $validatedData = Validator::make($request->all(), [
            'order_id' => 'bail|required',
            'otp' => 'bail|required',
        ]);
        if ($validatedData->fails()) {
            $data['error'] = "Invalid Data";
            return redirect()->back()->with($data);
        }
        $order  = Order::find($request->input('order_id'));
        if($order->otp == $request->input('otp')){
            $order->status = 3;
            $order->save();
            SentMailToUserJob::dispatch(Auth::user(),$order,'ORDER COMPLETED');
            return redirect(route('oldOrder'));
        }else{
            $data['error'] = "Invalid Otp";
            return redirect()->back()->with($data);
        }

    }
    
}
