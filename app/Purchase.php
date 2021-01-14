<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['provider_id', 'user_id', 'type', 'number_fact', 'purchase_date', 'tax', 'status', 'picture'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
    public function purchaseDetails(){
        return $this->hasMany(PurchaseDetails::class);
    }
}
