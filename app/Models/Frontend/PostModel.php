<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $primaryKey = "posts_id";
    protected $fillable = ["posts_title", "posts_description", "posts_type"];
}
