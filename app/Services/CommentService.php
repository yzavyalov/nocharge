<?php

namespace App\Services;

use App\Models\Badbook\ItemComments;

class CommentService
{
    public function createComment($badItemId,$partnerId,$userId,$textComment)
    {
        $comment = ItemComments::create([
            'bad_item_id' => $badItemId,
            'partner_id' => $partnerId,
            'user_id' => $userId,
            'text' => $textComment,
        ]);

        return $comment;
    }
}
