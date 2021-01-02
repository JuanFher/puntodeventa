<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $fillable = ['purchase_id', 'product_id', 'quantity', 'price'];

    public function purchase()
    {
    	$this->belongsTo(Purchase::class);
    }
    public function product()
    {
    	$this->belongsTo(Product::class);
    }
}
