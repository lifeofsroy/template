<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\CheckoutAdminMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;

class FrontCartItem extends Component
{
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        $this->dispatchBrowserEvent('removed', ['message' => 'Removed From Cart']);
    }

    public function checkout()
    {
        dd('not available now');
    }

    public function render()
    {
        return view('livewire.front-cart-item');
    }
}
