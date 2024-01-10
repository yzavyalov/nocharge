<?php

namespace App\Models\Badbook;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadItem extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'partner_id',
        'name',
        'category',
        'text',
        'link',
    ];

    public function comments()
    {
        return $this->hasMany(ItemComments::class,'bad_item_id','id');
    }

    public function twocomments()
    {
        return $this->hasMany(ItemComments::class,'bad_item_id','id')->orderBy('created_at','DESC')->take(2);
    }

}
