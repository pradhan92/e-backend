<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //Register
//    public function register (Request $request){
//     try{
//         $data = Validator::make($request->all(), [
//             'name' => 'required',
//             'email' => 'required|unique:customers,email',
//             'mobile' => 'required|unique:customers,mobile',
//             'address' => 'required',
//             'password' => 'required',
//         ]);
//         if ($data->fails()) {
//             return response()->json(['message' => $data -> message()],400);
//         } else {
//             $customer = new Customer();
//             $customer->name=$request->name;
//             $customer->email=$request->email;
//             $customer->mobile=$request->mobile;
//             $customer->address=$request->address;
//             $customer->password=Hash::make($request->password);
//             $customer->save();
//         }
//         return response() -> json (['message' => 'Register successfully','success' => true],201);
//     } catch (Exception $e) {
//         print($e);
//    }
// }


    //Register
   public function register (Request $request){
    try{
        $rules = [
                    'name' => 'required',
                    'email' => 'required|unique:customers,email',
                    'mobile' => 'required|unique:customers,mobile',
                    'address' => 'required',
                    'password' => 'required',
                ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return response()->json($validator->errors(),400);
        } else {
            $customer = new Customer();
            $customer->name=$request->name;
            $customer->email=$request->email;
            $customer->mobile=$request->mobile;
            $customer->address=$request->address;
            $customer->password=Hash::make($request->password);
            $customer->save();
        }
        return response() -> json (['message' => 'Register successfully','success' => true],201);
    } catch (Exception $e) {
        print($e);
   }
}

//login
public function login(Request $request){

    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $customer = Customer::where('email', $request->email)->first();

    if (! $customer || ! Hash::check($request->password, $customer->password)) {
        return response()->json(['message'=>'Invalid email or password']);
    }
    $token =$customer->createToken($request->email)->plainTextToken;
    return response()->json(['success'=> true,'token' =>$token,'customer' => $customer],200);
}
//logout
}
