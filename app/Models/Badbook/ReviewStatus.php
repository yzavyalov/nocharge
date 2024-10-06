<?php

namespace App\Models\Badbook;

use App\Models\Partners;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'bad_item_id',
        'partner_id',
        'grade',
        'sum',
    ];

    public function baditem()
    {
        return $this->belongsTo(BadItem::class,'bad_item_id','id');
    }

    public function partner()
    {
        return $this->belongsTo(Partners::class);
    }
}
