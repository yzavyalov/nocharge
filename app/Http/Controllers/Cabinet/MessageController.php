<?php

namespace App\Http\Controllers\Cabinet;

use App\Enums\MessageTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function create(MessageRequest $request)
    {
        $request = $request->validated();

        $request['status'] = MessageTypeEnum::NEW;

        $message = Message::create($request);

        Mail::send(['text' => 'emails.message'], ['user_id' => $request['user_id'], 'subject' => $request['subject'], 'text' => $request['text'], 'status' => $request['status']], function($message){
              $message->to('8540462@gmail.com', 'IAFS')->subject('form IAFS');
              $message->from('administartor@iafs.info', 'Internet Association of Fintech Services');
        });

        $user = Auth::user();

        return view('cabinet.pages.contact-in-cabinet',compact('message','user'));
    }


    public function read($id)
    {
        $message = Message::query()->find($id);

        $messageTypes = MessageTypeEnum::toSelectArray();

        return view('cabinet.my.read-message',compact('message','messageTypes'));
    }

    public function delete($message_id)
    {
        $message = Message::query()->find($message_id);

        $message->delete();

        return redirect()->route('cabinet-contact');
    }
}
