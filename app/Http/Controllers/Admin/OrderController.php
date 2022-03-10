<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderPostRequest;
use App\Premium_plan;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway) {

        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token,
        ];
        return view('admin.profile.premium', compact('token'));
    }

    public function  makePayment(OrderPostRequest $request, Gateway $gateway) {

        dd($request->all());
        
        $premium_plan = Premium_plan::find($request->premium_plan);

        if ($premium_plan) {

            $result = $gateway->transaction()->sale([
                'premium_plan' => $request->price,
                'paymentMethodNonce' => $request->token,
                'options' => [
                    'submitForSettlement' => true,
                ]
            ]);
    
            if ($result->success) {
                $data = [
                    'success' => true,
                    'token' => 'Transazione eseguita con successo',
                ];
            } else {
                $data = [
                    'success' => false,
                    'token' => 'Transazione fallita',
                ];
            }
            return view('admin.profile.payment_result', compact('data'));
        }

        return redirect()->route('admin.premium_plan')->with('error', 'Piano non trovato');
        
    }
}
