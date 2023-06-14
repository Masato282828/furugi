<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
        'name',
        'overview',
        'address',
        'category_id',
    ];
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
    // public function likes()
    // {
    //     return $this->hasMany(Like::class, 'shop_id');
    // }
}
