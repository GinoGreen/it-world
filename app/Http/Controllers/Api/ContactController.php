<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request) {

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255|min:2',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }


        $new_message = new Message();
        $new_message->name = $data['name'];
        $new_message->message = $data['message'];
        $new_message->user_id = $data['user_id'];
        $new_message->save();

        // if ($data['type'] === 'message') {
        //     $new_message = new Message();
        //     $new_message->fill($data);
        //     $new_message->save();
        // } elseif ($data['type'] === 'review') {
        //     $new_review = new Review();
        //     $new_review->fill($data);
        //     $new_review->save();
        // }

        // $new_contact = new Contact();
        // $new_contact->fill($data);
        // $new_contact->save();

        // Mail::to('info@potato.com')->send(new NewContact($new_contact));

        return response()->json(['success' => true]);
    }
}
