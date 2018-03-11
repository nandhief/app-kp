<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	public static function boot()
    {
        parent::boot();

        Transaction::observe(new \App\Observers\UserActionsObserver);
    }

    public function users()
    {
    	return $this->belongsTo(User::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
