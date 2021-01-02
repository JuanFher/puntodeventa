<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['provider_id', 'user_id', 'purchase_date', 'tax', 'total', 'status', 'picture', ];

    public function user()
    {
    	$this->belongsTo(User::class);
    }

    public function provider()
    {
    	$this->belongsTo(Provider::class);
    }

    public function purchaseDetails()
    {
    	$this->hasMany(PurchaseDetail::class);
    }
}
