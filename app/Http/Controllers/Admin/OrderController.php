<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderPostRequest;
use App\Premium_plan;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function generate($id, Gateway $gateway) {

        $plan = Premium_plan::find($id);

        if ($plan) {

            $token = $gateway->clientToken()->generate();
            return view('admin.profile.premium', compact('token', 'plan'));
        }

        abort(404, 'Piano non trovato');

    }

    public function makePayment($id, Request $request, Gateway $gateway) {

        $premium_plan = Premium_plan::find($id);
        
        $price = Premium_plan::where('id', $id)->first()->price;


        $result = $gateway->transaction()->sale([
            'amount' => $price,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' => [
                'submitForSettlement' => true,
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => 'Transazione eseguita con successo',
            ];

            $profile = Auth::user();
            $profile->premium_plans()->attach($premium_plan);
        } else {
            $data = [
                'success' => false,
                'message' => 'Transazione fallita',
            ];
        }

        return view('admin.profile.payment_result', compact('data', 'result'));
        
    }
}
