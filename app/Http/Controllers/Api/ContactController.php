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
            'message' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }


        

        if ($data['type'] === 'message') {
            $new_message = new Message();
            $new_message->name = $data['name'];
            $new_message->email = $data['email'];
            $new_message->message = $data['message'];
            $new_message->user_id = $data['user_id'];
            $new_message->save();
        } elseif ($data['type'] === 'review') {
            $new_review = new Review();
            $new_review->title = $data['name'];
            $new_review->vote = $data['vote'];
            $new_review->description = $data['message'];
            $new_review->user_id = $data['user_id'];
            $new_review->save();
        }

        // $new_contact = new Contact();
        // $new_contact->fill($data);
        // $new_contact->save();

        // Mail::to('info@potato.com')->send(new NewContact($new_contact));

        return response()->json(['success' => true]);
    }
}
