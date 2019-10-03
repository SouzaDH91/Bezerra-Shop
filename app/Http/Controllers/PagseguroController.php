<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pagseguro;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\PaymentCardRequest;

class PagseguroController extends Controller
{
    public function pagseguro(Pagseguro $pagseguro)
    {
        $code = $pagseguro->generate();
        
        $urlRedirect = config('pagseguro.url_redirect_after_request').$code;
        
        return redirect()->away($urlRedirect);
    }
    
    public function lightbox()
    {
        return view('pagseguro-lightbox');
    }
    
    public function lightboxCode(Pagseguro $pagseguro)
    {
        return $pagseguro->generate();
    }
    
    public function transparente()
    {
        return view('pagseguro-transparente');
    }
    
    public function getCode(Pagseguro $pagseguro)
    {
        return $pagseguro->getSessionId();
    }
    
    public function billet(Request $request, Pagseguro $pagseguro, Order $order)
    {
        $response = $pagseguro->paymentBillet($request->sendHash);
        
        if ( $response['success'] ) {

            $order = Order::findOrFail(Auth::user()->id);
            // Registra o code da compra
            $order['code'] = $response['code'];
            Order::save($order);
            
            // Limpa o carrinho de compras
            //$cart->emptyCart();
        }
        
        // Retorno da transação
        return response()->json($response, 200);
    }
    
    public function card()
    {
        return view('pagseguro-transparent-card');
    }
    
    public function cardTransaction(Request $request, Pagseguro $pagseguro)
    {
        return $pagseguro->paymentCredCard($request);
    }


    public function paymentCard(PaymentCardRequest $request, Pagseguro $pagseguro, Order $order)
    {
        $response = $pagseguro->paymentCredCard($request);
        
        if ( $response['success'] ) {
            $cart = new Cart;

            // Registra a compra do usuário
            $order->newOrderProducts($cart, $response['order_number'], $response['code'], $response['status'], 1);
            
            // Limpa o carrinho de compras
            //$cart->emptyCart();
        }
        
        // Retorno da transação
        return response()->json($response, 200);
    }
}