<?php

namespace App\Http\Controllers\Cabinet;

use App\Enums\MessageTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnswerRequest;
use App\Models\Answer;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AnswerController extends Controller
{
    public function createAndSend(AnswerRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::find($validatedData['user_id']);

        Mail::send('mail.answer-message', [
            'name' => $user->name,
            'text' => $validatedData['answer_text'],
            'subject' => $validatedData['subject'],
        ], function ($message) use ($user, $validatedData) {
            $message->to($user->email)->subject($validatedData['subject']);
            $message->from('8540462@gmail.com','Administrator');
        });

        $answer = Answer::create([
            'message_id' => $validatedData['message_id'],
            'user_id' => $user->id,
            'email' => $user->email,
            'text' => $validatedData['answer_text'],
        ]);

        $message = Message::query()->find($validatedData['message_id']);

        $message->update([
            'status' => MessageTypeEnum::ANSWERED,
        ]);

        return redirect()->route('cabinet-contact');
    }
}
