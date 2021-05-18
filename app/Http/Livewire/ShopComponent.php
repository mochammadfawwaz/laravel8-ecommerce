<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    public function store($products_id, $product_name, $product_price){
        Cart::add(
            $products_id,
            $product_name,
            1,
            $product_price
            ) -> associate('App\models\Product');
            session()->flash('success_message', 'Item added in Cart');
            return redirect() -> route('product.cart');
    }
    use WithPagination;
    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.shop-component', ['products' => $products])->layout("layouts.base");
    }
}
