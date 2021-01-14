<?php

namespace App\Http\Livewire;

use App\Product;
use App\Provider;
use Livewire\Component;

class Purchases extends Component
{

	public $provider_id='Elegir', $type='Elegir', $number_fact, $purchase_date, $tax = 12, $status, $picture;
	public $product_id, $quantity, $sell_price, $buy_price, $subtotal, $total, $taxiva, $itemtotal;
	public $selected_id, $search;
	public $providers, $products, $provider;
	public $orderProducts = [];
	public $action = 1;

	public function mount()
	{
		
	}
    public function render()
    {
    	$this->orderProducts;
    	$this->products = Product::all();
    	$this->providers = Provider::all();
    	if ($this->selected_id > 0) {
	    		$this->provider = Provider::find($this->selected_id);
	    		return view('livewire.purchases', [
	        	'products' => $this->products,
	        	'provider' => $this->provider_id,
	        	'orderProducts' => $this->orderProducts
	        ]);
    	}else{
        return view('livewire.purchases', [
        	'products' => $this->products,
        	'providers' => $this->providers,
        	'orderProducts' => $this->orderProducts
        	]);
    	}
    }

    public function doAction($action)
    {
    	$this->selected_id = $action;
    }
    private function resetInput()
    {
        $this->product_id = '';
        $this->quantity   = null;
        $this->buy_price  = null;
        $this->sell_price = null;
    }


    public function addProduct()
    {	
        if ($this->product_id == '') {
            $this->dispatchBrowserEvent('alertaerrores');
        }else{
            $product               = Product::find($this->product_id);
            $descripcion           = $product->name;
            $this->itemtotal             = floatval($this->quantity) * floatval($this->buy_price);
            $this->subtotal              = floatval($this->subtotal) + floatval($this->itemtotal);
            $this->taxiva = (floatval($this->subtotal) * floatval($this->tax))/100;
            $this->total = floatval($this->subtotal) + floatval($this->taxiva);
            $orderProduct          = array('name' => $descripcion, 'quantity' => $this->quantity, 'buy_price' => $this->buy_price, 'sell_price' =>$this->sell_price, 'itemtotal' => $this->itemtotal);
            $this->orderProducts[] = $orderProduct;
            $this->dispatchBrowserEvent('productoagregado');
            $this->resetInput();
            }
    }

    public function removeItem($key)
    {
        $this->subtotal = $this->subtotal - $this->orderProducts[$key]['itemtotal'];
        $this->taxiva   = ($this->subtotal * $this->tax)/100;
        $this->total    = $this->subtotal + $this->taxiva;
        unset($this->orderProducts[$key]);
        $this->dispatchBrowserEvent('productoeliminado');
    }
    
}
