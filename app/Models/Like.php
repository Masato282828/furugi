<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillale = ['shop_id','user_id'];
    
    public function reply()
    {
        return $this->belongsTo(Reply::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
