<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipModel extends Model
{
    use HasFactory;
    protected $table = "memberships";
    protected $primaryKey = "memberships_id";
    protected $fillable = ["memberships_name", "memberships_email", "memberships_type"];
}
