<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customers;

class CustomersController extends Controller{
    public function __construct(){

    }

    public function index(){
        $customer   = Customers::all();
        if($customer){
            return response()->json(
                [
                    'status'    => true,
                    'message'   => 'List of Customers',
                    'data'      => $customer
                ],201
            );
        }else{
            return response()->json(
                [
                    'status'    => false,
                    'message'   => 'Error Fetching Data',
                    'data'      => null
                ], 401
            );
        }
    }
    public function store(Request $req){
        $name       = $req->input('name');
        $address    = $req->input('address');
        $phone      = $req->input('phone');
        $company_id = $req->input('company_id');
        $result     = Customers::create(
            [
                'name'      => $name,
                'address'   => $address,
                'phone'     => $phone,
                'company_id'=> $company_id
            ]
        );
        if($result){
            return response()->json(
                [
                    'status'    => true,
                    'message'   => 'Data Successfully Insert'
                ],201
            );
        }else{
            return response()->json(
                [
                    'status'    => false,
                    'message'   => 'Error Inserting Data'
                ],400
            );
        }
    }
    public function show($id){
        $customer   = Customers::find($id);
        if($customer){
            return response()->json(
                [
                    'status'    => true,
                    'message'   => 'List of Customers',
                    'data'      => $customer
                ], 201
            );
        }else{
            return response()->json(
                [
                    'status'    => false,
                    'message'   => 'Error Getting Data',
                    'data'      => null
                ], 401
            );
        }
    }
    public function update($id, Request $request){
        $customer = Customers::find($id);
        if($customer){
            $customer->name         = $request->input('name');
            $customer->address      = $request->input('address');
            $customer->phone        = $request->input('phone');
            $customer->company_id   = $request->input('company_id');
            $result                 = $customer->save();
            if($result){
                return response()->json(
                    [
                        'status'    => true,
                        'message'   => 'Data Successfully Updated'
                    ], 201
                );    
            }else{
                return response()->json(
                    [
                        'status'    => false,
                        'message'   => 'Error Updating Data'
                    ], 401
                );    
            }
        }else{
            return response()->json(
                [
                    'status'    => false,
                    'message'   => 'Data Couln\'t Find'
                ], 401
            );
        }
    }
    public function destroy($id){
        $customer = Customers::destroy($id);
        if($customer){
            return response()->json(
                [
                    'status'    => true,
                    'message'   => 'Data Successfully Deleted'
                ], 201
            );
        }else{
            return response()->json(
                [
                    'status'    => false,
                    'message'   => 'Error Deleting Data'
                ], 401
            );
        }
    }
}