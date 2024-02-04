<?php

namespace App\Http\Controllers\Cabinet;

use App\Enums\MessageTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function create(MessageRequest $request)
    {
        $request = $request->validated();

        $request['status'] = MessageTypeEnum::NEW;

        $message = Message::create($request);

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
