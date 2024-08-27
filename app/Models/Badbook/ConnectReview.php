<?php

namespace App\Models\Badbook;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectReview extends Model
{
    use HasFactory;

    protected $table = 'connect_rewiews';

    protected $fillable = ['main_bad_item_id', 'secondary_bad_item_id'];


}
