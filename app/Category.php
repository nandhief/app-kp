<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['kode', 'name'];
    
    public static function boot()
    {
        parent::boot();
        Category::observe(new \App\Observers\UserActionsObserver);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
