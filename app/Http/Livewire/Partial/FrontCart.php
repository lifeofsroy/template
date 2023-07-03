<?php

namespace App\Http\Livewire\Partial;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class FrontCart extends Component
{
    public function destroy($rowId)
    {
        Cart::remove($rowId);
    }

    public function render()
    {
        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
        }

        return view('livewire.partial.front-cart');
    }
}
