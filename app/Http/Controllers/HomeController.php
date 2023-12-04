<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pump;
use App\Models\Config;
use App\Models\Order;
use Auth;
use Log;
use App\Jobs\SentMailToUserJob;
class HomeController extends Controller
{
    public function index()  {
        $user = Auth::User();
        $pumpList = Pump::inRandomOrder()
                ->when(!empty($user),function($query) use ($user)  {
                    $query->where('pincode',$user->pincode);
                })
                ->get();
        return view('home.index',compact('pumpList'));
    }
    public function about()  {
        return view('home.about');
    }

    public function oderForm($pump_id)  {
        $pump = Pump::find($pump_id);
        $config = Config::find(1);
        return view('home.order',compact('pump','config'));
    }
    public function saveOrder(Request $request)  {
        $config = Config::find(1);
        $user  = Auth::user();
        $order = new Order();
        $order->user_id = $user->id;
        $order->email = $user->email;
        $order->address = $user->address;
        $order->phone = $user->phone;
        $order->name  = $user->first_name.' '.$user->last_name;
        $order->pump_id = $request->input('pump_id');
        $order->pincode = $user->pincode;
        $total = 0;
        if($request->input('petrol')>0){
            $order->petrol_price = $config->petrol;
            $order->petrol_qty = $request->input('petrol_qty');
            $total += $order->petrol_price* $order->petrol_qty;
        }
        if($request->input('diesel')>0){
            $order->diesel_price = $config->diesel;
            $order->diesel_qty = $request->input('diesel_qty');
            $total += $order->diesel_price* $order->diesel_qty;
        }
        if($request->input('premium_petrol')>0){
            $order->premium_petrol_price = $config->premium_petrol;
            $order->premium_petrol_qty = $request->input('premium_petrol_qty');
            $total += $order->premium_petrol_price* $order->premium_petrol_qty;
        }
        $order->delivery_fee = $config->delivery_fee;
        $order->total = (int)($total+ $order->delivery_fee);
        $order->save();
        $pump = Pump::find($order->pump_id);
        $order->order_number = str_replace(' ', '', 'ODFUEL'.strtoupper($pump->name).$order->id);
        $order->save();
        SentMailToUserJob::dispatch($user,$order,'ORDER RECEIVED');
        return response()->json(['message'=>'success']);

    }
    public function orderList() {
        $userId = Auth::Id();
        $orders = Order::select('orders.*','users.email as agent_email',
            'users.phone as agent_phone','users.address as agent_address','pumps.name as pump_name','pumps.email as pump_email','pumps.phone as pump_phone','pumps.location as pump_location','pumps.image as pump_image')
            ->leftJoin('users','users.id','=','orders.delivery_agent')
            ->leftJoin('pumps','pumps.id','=','orders.pump_id')
            ->where('user_id',$userId)->orderBy('orders.status')->get();
        return view('home.order_list',compact('orders'));
    }
    public function cancelOrder($order_id)  {
        $order = Order::find($order_id)->delete();
        return redirect()->back();
    }

}
