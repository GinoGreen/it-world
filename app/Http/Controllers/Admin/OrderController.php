<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderPostRequest;
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
        return view('admin.profile.premium', compact('data'));
    }

    public function  makePayment(OrderPostRequest $request, Gateway $gateway) {

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
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
}
