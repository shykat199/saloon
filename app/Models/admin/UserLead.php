<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLead extends Model
{
    use HasFactory;

    protected $fillable=['name','location','phone','source','contact_date','status'];
}
