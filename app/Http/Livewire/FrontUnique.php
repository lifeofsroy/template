<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Checkout;
use App\Models\Template;
use App\Mail\CheckoutUserMail;
use App\Mail\CheckoutAdminMail;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;

class FrontUnique extends Component
{
    public function store($template_id, $template_title, $template_price)
    {
        Cart::add($template_id, $template_title, 1, $template_price)->associate('App\Models\Template');

        $this->dispatchBrowserEvent('added', ['message' => 'Added to Cart']);
        return redirect()->route('template.cart');
    }

    public function render()
    {
        $uniques = Template::where('type', 'unique')->get();

        return view('livewire.front-unique', [
            'uniques' => $uniques,
        ]);
    }
}
