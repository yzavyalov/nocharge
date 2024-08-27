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
        'title',
        'description',
        'image',
    ];

    public function comments()
    {
        return $this->hasMany(ItemComments::class,'bad_item_id','id');
    }

    public function twocomments()
    {
        return $this->hasMany(ItemComments::class,'bad_item_id','id')->orderBy('created_at','DESC')->take(2);
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ConnectReview::class, 'main_bad_item_id');
    }

    // Получение связей, где текущий элемент является вторичным
    public function parents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ConnectReview::class, 'secondary_bad_item_id');
    }

    public function mainBadItem(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(BadItem::class, 'connect_rewiews','secondary_bad_item_id','main_bad_item_id');
    }

    // Связь с вторичной плохой записью
    public function secondaryBadItem(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(BadItem::class, 'connect_rewiews','main_bad_item_id','secondary_bad_item_id');
    }
}
