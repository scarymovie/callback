<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderStoreRequest $request, Order $order)
    {
        $validated = $request->validated();
        try {
            if ($request->hasFile('file')) {
                $order->addMediaFromRequest('file')->toMediaCollection('file');
            }
            $order->topic = $validated['topic'];
            $order->description = $validated['description'];
            $order->user_id = Auth::id();
            $order->save();

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect()->back()->with('message', 'IT WORKS!');
    }

}
