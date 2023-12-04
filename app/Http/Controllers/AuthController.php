<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Auth;
class AuthController extends Controller
{
    public function index()  {
        return view('login.login');
    }

    public function authenticate(Request $request)  {
        $email = $request->input('email');
        $password = $request->input('password');
        $validatedData = Validator::make($request->all(), [
            'email' => 'bail|email|required',
            'password' => 'bail|required',
        ]);
        if ($validatedData->fails()) {
            $data['error'] = "Enter valid email/password";
            return redirect(route('login'))->with($data);
        }
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            if($user->role==1){
             return redirect(route('dashBoard'));
            }elseif($user->role==2){
                return redirect(route('agentHome'));
            }
            else{
              return redirect(route('index'));
            }
           
        }
        $data['error'] = "Incorrect email/password";
        return redirect(route('login'))->with($data);
    }

    public function signUp(){
       return view('login.sign_up');
    }
    public function registration(Request $request)  {
    
        $validatedData = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255|bail',
            'last_name' => 'required|string|max:255|bail',
            'email' => 'required|email|unique:users,email|max:255|bail',
            'phone' => 'required|string|min:8|bail',
            'address' => 'required|bail',
            'pincode'=>'required|bail|max:8|min:4',
            'password'=>'required|bail|min:8',
        ]);
        if ($validatedData->fails()) { 
            return redirect()->back()->withErrors($validatedData)
                ->withInput();
        }
        $formData = $request->all();
        $formData['password'] = bcrypt($formData['password']);
        $formData['role']= 3;
        $user = User::create($formData);
        Auth::login($user, true);
        return redirect(route('index'));
 
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect(route('index'));
    }

    public function updateProfile()  {
        
    }
}
