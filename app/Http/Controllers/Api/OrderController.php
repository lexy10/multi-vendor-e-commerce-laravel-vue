<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function addOrder(Request $request)
    {
        try {

            $newOrder = new Order();
            $newOrder->user_id = $request->user_id;
            $newOrder->cart = json_encode($request->cart, true);
            $newOrder->order_status = $request->order_status;
            $newOrder->payment_status = $request->payment_status;
            $newOrder->payment_reference = $request->payment_reference;
            $newOrder->price = $request->price;

            $newOrder->save();

            if (!$newOrder) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unable to create order'
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Order placed successfully'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => $exception->getMessage()
            ]);
        }
    }
}
