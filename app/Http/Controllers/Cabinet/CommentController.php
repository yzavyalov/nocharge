<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Badbook\ItemComments;
use App\Services\CommentService;
use App\Services\PartnerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function create(CommentRequest $request, $id)
    {
       $request = $request->validated();

       $partner_id = PartnerService::getIdCurrentParnter(Auth::id());

       $this->commentService->createComment($id,$partner_id,Auth::id(),$request['text']);

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
