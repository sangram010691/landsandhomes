<?php

namespace App\Http\Controllers;

use App\Models\customer;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CustomerController extends Controller
{

    public function store(Request $request)
    {

        $validate =  $request->validate( [
            'name' => ['required','string','max:50'],
            'desc' => ['required','string','max:250'],
            'type' => ['required','integer'],
            'image' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:5120'],
        ]);

//        if ($validate->fails){
//            return response()->json('try again|validation error');
//        }
//
        $customer_details = new customer;
        $file = $request->file('image');
        $customer_details->image = $file;
        $path = public_path('images');
        $request->image->move($path, $path);
//        Storage::disk('locall')->put($file, 'Contents');
        $customer_details->name = $request->name;
        $customer_details->desc = $request->desc;
        $customer_details->type = $request->type;

        if ($customer_details->save()){
            return response()->json($customer_details,200);
        }

        return response()->json('sorry try again later');
    }

    public function customer_one(Request $request)
    {
        $id = $request->id;
        $customer = new customer();
        $customer_details = $customer->find($id);
        $uel = $customer_details->temporaryUrl();
        return response()->json($uel);
    }

    public function all()
    {
        $customer = customer::paginate(3,['name','type','desc']);
        return response()->json($customer);
    }
}
