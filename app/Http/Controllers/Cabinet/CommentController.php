<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Badbook\ItemComments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(CommentRequest $request, $id)
    {
        $request = $request->validated();

        $request['bad_item_id'] = $id;

        if (session()->get('partner_id'))
            $partner_id = session()->get('partner_id');
        else
            $partner_id = 1;

        $request['partner_id'] = $partner_id;

        $request['user_id'] = Auth::id();

        $comment = ItemComments::create($request);

        return redirect()->back();
    }


    public function show($id)
    {
        $comment = ItemComments::query()->find($id);

        return view('cabinet.update-comment-page',compact('comment'));
    }

    public function update(CommentRequest $request, $id)
    {
        $comment = ItemComments::query()->find($id);

        $comment->update($request->validated());

        return redirect()->route('index-review');
    }

    public function delete($id)
    {
        $comment = ItemComments::query()->find($id);

        $comment->delete();

        return redirect()->route('index-review');
    }
}
