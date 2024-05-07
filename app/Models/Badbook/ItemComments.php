<?php

namespace App\Models\Badbook;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemComments extends Model
{
    use HasFactory;

    protected $fillable = [
        'bad_item_id',
        'partner_id',
        'user_id',
        'text',
    ];

    public function baditem()
    {
        return $this->belongsTo(BadItem::class,'bad_item_id','id');
    }
}
