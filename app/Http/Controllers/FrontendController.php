<?php

namespace App\Http\Controllers;
use App\Models\Pizza;
use App\Models\Order;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request){
        if(!$request->category){
            $pizzas = Pizza::latest()->get();
        } elseif($request->category=="all") {
            $pizzas = Pizza::latest()->get();
        }else {
            $pizzas = Pizza::latest()->where('category', $request->category)->get();
        }
        
        return view('frontend', compact('pizzas'));
    }

    public function show($id){
        $pizza = Pizza::find($id);
        return view('show', compact('pizza'));
    }

    public function store(Request $request){
        $request->validate([
            'phone' => 'required'
        ]);

       if($request->small_pizza==0 && $request->medium_pizza==0 && $request->large_pizza==0){
            return redirect()->back()->with('message', 'Please enter any Pizza Size Quantity');
        }

        $orderPlace = Order::create([
            'user_id' => auth()->user()->id,
            'date' => $request->date,
            'time' => $request->time,
            'pizza_id' => $request->pizza_id,
            'small_pizza' => $request->small_pizza,
            'medium_pizza' => $request->medium_pizza,
            'large_pizza' => $request->large_pizza,
            'body' => $request->body,
            'status' => 'pending',
            'phone' => $request->phone,
        ]);
        if($orderPlace){
            return redirect('/home')->with('message', 'Order has been Placed Successfully.');
        } else {
            return redirect()->back()->with('message', 'Something went wrong please try again.');
        }
    }
}
