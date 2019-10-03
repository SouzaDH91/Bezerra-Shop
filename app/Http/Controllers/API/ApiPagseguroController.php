<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagseguro;
use App\Order;

class ApiPagseguroController extends Controller
{
    public function request(Request $request, Pagseguro $pagseguro, Order $order)
    {
        if(!$request->notificationCode)
            return response()->json(['error' => 'NotNotificationCode'], 404);
        
        $response = $pagseguro->getStatusTransaction($request->notificationCode);
        
        $order = $order->where('order_number', $response['order_number'])->get()->first();
        $order->changeStatus($response['status']);
        
        return response()->json(['success' => true]);
    }
}
