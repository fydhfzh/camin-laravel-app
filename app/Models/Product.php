<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $with = ['category', 'reviews'];
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function scopeBestSeller($query){
        return $query->orderBy('product_sold', 'DESC');
    }

    public function scopeSearch($query, $request)
    {
        $query->when($request['search'] ?? false, function($query, $search){
            return $query->where('product_name', 'like', '%'.$search.'%')->orWhere('product_description', 'like', '%'.$search.'%');
        });

        $query->when($request['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'product_name'
            ]
        ];
    }
}
