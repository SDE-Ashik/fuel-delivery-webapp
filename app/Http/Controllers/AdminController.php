<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pump;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Config;
use Validator;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::select('orders.*','users.first_name','users.last_name','users.email as agent_email',
            'users.phone as agent_phone','users.address as agent_address','pumps.name as pump_name','pumps.email as pump_email','pumps.phone as pump_phone','pumps.location as pump_location')
            ->leftJoin('users','users.id','=','orders.delivery_agent')
            ->leftJoin('pumps','pumps.id','=','orders.pump_id')
            ->latest()->get();
        return view('admin.index', compact('orders'));
    }
    public function pumpList()
    {
        $pumpList = Pump::latest()->get();
        return view('admin.pump.list', compact('pumpList'));
    }
    public function addPump()
    {
        return view('admin.pump.add');
    }
    public function savePump(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:255|bail',
            'email' => 'required|email|max:255|bail',
            'phone' => 'required|string|min:8|bail',
            'address' => 'required|bail',
            'location' => 'required|bail',
            'pincode' => 'required|bail|max:8|min:4',
            'image' => 'bail|image|mimes:jpeg,jpg,png|max:5120',
        ]);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)
                ->withInput();
        }
        $formData = $request->all();
        if ($request->has('image')) {
            $imagePath = $request->file('image');
            // dd($imagePath);
            $imageName = $imagePath->getClientOriginalName();
            $destination = public_path('/uploads/pump');
            $imagePath->move($destination, $imageName);
            $formData['image'] = $imageName;
        }
        $pump = Pump::updateOrCreate(['id' => $request->input('id')], $formData);
        return redirect(route('pumpList'));

    }
    public function editPump($id)
    {
        $pump = Pump::find($id);
        return view('admin.pump.edit', compact('pump'));

    }
    public function deliveryAgents()
    {
        $users = User::where('role', 2)->latest()->get();
        return view('admin.agent.list', compact('users'));
    }
    public function addAgent()
    {
        return view('admin.agent.add');
    }
    public function saveAgent(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255|bail',
            'last_name' => 'required|string|max:255|bail',
            'email' => 'required|email|unique:users,email|max:255|bail',
            'phone' => 'required|string|min:8|bail',
            'address' => 'required|bail',
            'password' => 'required|bail|min:3',
        ]);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)
                ->withInput();
        }
        $formData = $request->all();
        $formData['password'] = bcrypt($formData['password']);
        $formData['role'] = 2;
        $user = User::create($formData);
        return redirect(route('deliveryAgents'));
    }
    public function deleteAgent($userId)
    {
        $user = User::find($userId)->delete();
        return redirect()->back();
    }
    public function getConfig(){
        $config = Config::find(1);
        return view('admin.config',compact('config'));

    }
    public function saveConfig(Request $request)  {
        $validatedData = Validator::make($request->all(), [
            'petrol' => 'required|bail',
            'diesel' => 'required|bail',
            'pincode' => 'required|min:4|bail',
            'premium_petrol' => 'required|bail',
           
        ]);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)
                ->withInput();
        }
        $formData = $request->all();
        $config = Config::updateOrCreate(['id'=>1],$formData);
        return redirect(route('getConfig'));
    }

}
