<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['quantity', 'product_id'];
    
    public static function boot()
    {
        parent::boot();
        Warehouse::observe(new \App\Observers\UserActionsObserver);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
