<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Template;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class FrontSpecial extends Component
{
    public function store($template_id, $template_title, $template_price)
    {
        Cart::add($template_id, $template_title, 1, $template_price)->associate('App\Models\Template');

        $this->dispatchBrowserEvent('added', ['message' => 'Added to Cart']);
        return redirect()->route('template.cart');
    }

    public function render()
    {
        $specials = Template::where([['type', 'special'], ['status', 1]])->get();

        if (Auth::check()) {
            Cart::instance('cart')->restore(Auth::user()->email);
        }

        return view('livewire.front-special', [
            'specials' => $specials,
        ]);
    }
}
