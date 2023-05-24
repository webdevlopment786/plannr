<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryListing extends Model
{
    use HasFactory;

    protected $table = 'category_listing';

    protected $fillable = [
        'category_id', 'free_or_premium','product_title', 'image', 'status',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
