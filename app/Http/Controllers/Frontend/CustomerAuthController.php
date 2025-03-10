<?php

namespace App\Http\Controllers\Frontend;

use Session;
use Illuminate\Http\Request;

use App\Models\Frontend\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    public function index(){
        return view('frontend.customer.login');
    }

    public function login(Request $request){

        $customer = Customer::where('email', $request->email)->first();

        if($customer){
            // dd($request->password);
            if(password_verify($request->password, $customer->password)){
                Session::put('customer_id', $customer->id);
                Session::put('customer_name', $customer->name);

                return redirect()->route('customer.dashbord')->with('message', 'Customer Login Successfully.');
            }else{
                return back()->with('message', 'Invalid Password...');
            }

        }else{
            return back()->with('message', 'Invalid Email Address.');
        }
    }

    public function customerRegister(){
        return view('frontend.customer.register');
    }

    public function register(Request $request){
        // return $request->all();
        
        $request->validate([
            'name'  => 'required',
            'email' =>'required|unique:customers,email',
            'password' => 'required',
            'mobile' => 'required|unique:customers,mobile',
        ]);

        $customer = new Customer();
        
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile  = $request->mobile;
        if($request->password){
            $customer->password = bcrypt($request->password);
        }else{
            // dd( $customer->mobile);
            $customer->password = bcrypt($request->mobile);
        }
        $customer->save();

        return redirect('/customer-login')->with('messages', 'Customer Register Successfully.');
    }


    public function customerLogout(){
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect()->route('home');
    }

    public function customerDashboard(){
        return view('frontend.customer.dashbord');
    }


    public function customerProfile(){
        return view('frontend.customer.profile');
    }

    // public function customerOrder(){
    //     return view('frontend.customer.order');
    // }



}
