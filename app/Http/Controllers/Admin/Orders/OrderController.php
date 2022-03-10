<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\Product;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway){
        
        $token = $gateway->clientToken()->generate();
        $data = [
            'token' => $token
        ];
        return view('payment',$data);

       
    }
    
    public function makePayment(OrderRequest $request,Gateway $gateway){
        dd('ciao');
        $product = Product::find($request->product);

        $result = $gateway->transaction()->sale([
            'amount' => $product->price,
            'paymentMethodNonce' => $request->token,
            'options' =>[
                'submitForSettlement' => true
            ]
        ]);

        if($result->success){
            $data = [
                'success' => true,
                'message' => "Transazione eseguita con successo"
            ];
            return response()->json($data,200);
        }else{
            $data = [
                'success' => false,
                'message' => "Transazione fallita"
            ];
            return response()->json($data,401);
        }
        return 'makePayment';
    }
}

