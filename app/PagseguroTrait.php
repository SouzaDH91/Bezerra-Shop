<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;
use GuzzleHttp\Client as Guzzle;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\User;
use App\UserDetails;

trait PagseguroTrait
{
    
    public function __construct(UserDetails $user_details)
    {
        $this->user_details = $user_details;
    }

    public function getConfigs()
    {
        return [
            'email' => config('pagseguro.email'),
            'token' => config('pagseguro.token'),
        ];
    }
    
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
    
    public function getItems()
    {
        $cart = Cart::content()->toArray();
        $items = [];
        $itemsCart = $cart;
        
        $posistion = 1;
        foreach ($itemsCart as $item) {
            $items["itemId{$posistion}"]            = $item['id'];
            //$items["itemDescription{$posistion}"]   = $item['description'];
            $items["itemAmount{$posistion}"]        = number_format($item['price'], 2, '.', '');
            $items["itemQuantity{$posistion}"]      = $item['qty'];
            
            $posistion++;
        }
        
        return $items;
        /*
        return [
            'itemId1' => '0001',
            'itemDescription1' => 'Produto PagSeguroI',
            'itemAmount1' => '99999.99',
            'itemQuantity1' => '1',
            'itemWeight1' => '1000',
            'itemId2' => '0002',
            'itemDescription2' => 'Produto PagSeguroII',
            'itemAmount2' => '99999.98',
            'itemQuantity2' => '2',
            'itemWeight2' => '750',
        ];
         */
    }
    
    
    public function getSender()
    {
        return [
            'senderName'        => $this->user_details->s_name,
            'senderAreaCode'    => $this->user_details->s_area_code,
            'senderPhone'       => $this->user_details->s_number,
            'senderEmail'       => $this->user_details->s_email,
            'senderCPF'         => $this->user->cpf,
        ];
    }
    
    public function getShipping()
    {
        return [
            'shippingType'                  => '1',
            'shippingAddressStreet'         => $this->user_details->s_address,
            'shippingAddressNumber'         => $this->user_details->s_addr_number,
            'shippingAddressComplement'     => $this->user_details->s_landmark,
            'shippingAddressDistrict'       => $this->user_details->s_coutry,
            'shippingAddressPostalCode'     => $this->user_details->s_zip,
            'shippingAddressCity'           => $this->user_details->s_city,
            'shippingAddressState'          => $this->user_details->s_state,
            'shippingAddressCountry'        => 'BRL',
        ];
    }


    public function getCreditCard($holderName)
    {
        return [
            'creditCardHolderName'      => $holderName,
            'creditCardHolderCPF'       => $this->user->cpf,
            'creditCardHolderBirthDate' => '01/01/1900',
            'creditCardHolderAreaCode'  => '99',
            'creditCardHolderPhone'     => '99999999',
        ];
    }


    public function billingAddress()
    {
        return [
            'billingAddressStreet'      => $this->user_details->s_address,
            'billingAddressNumber'      => $this->user_details->b_addr_numb,
            'billingAddressComplement'  => $this->user_details->s_landmark,
            'billingAddressDistrict'    => $this->user_details->b_country,
            'billingAddressPostalCode'  => $this->user_details->b_zip,
            'billingAddressCity'        => $this->user_details->b_city,
            'billingAddressState'       => $this->user_details->b_state,
            'billingAddressCountry'     => 'BRL',
        ];
    }
}