<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorService extends Model
{
    use HasFactory;

    protected $fillable=['visitor_id','service_id','paid_amt','due_amt','total_amt'];

    public function visitor()
    {
        return $this->hasOne(Visitor::class,'id','visitor_id');
    }
}
