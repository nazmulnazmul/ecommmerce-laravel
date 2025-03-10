<?php


namespace App\Models\Frontend;

use Flasher\Laravel\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Session;

class Customer extends Model
{
    use HasFactory;

    // private $customer;

    public static function newCustomer($request){

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile  = $request->phone;
        $customer->password = bcrypt($request->phone);
        // if($request->password){
        //     $customer->password = bcrypt($request->password);
        // }else{
        //     $customer->password = bcrypt($request->phone);
        // }
        $customer->save();
        return $customer;
        
    }


}
