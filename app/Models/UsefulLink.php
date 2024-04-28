<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsefulLink extends Model
{
    use HasFactory;

    protected $table = 'usuful_links';

    protected $fillable = [
        'id',
        'screen',
        'link',
        'title',
        'description',
    ];

}
