<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Observers\CascadeSoftDeletes;

class Product extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['inventory'];

    protected $dates = ['deleted_at'];
    
    public static function boot()
    {
        parent::boot();

        Product::observe(new \App\Observers\UserActionsObserver);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function inventory()
    {
        return $this->hasOne(Warehouse::class);
    }
}
