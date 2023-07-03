<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TemplateCategory;
use Gloudemans\Shoppingcart\Facades\Cart;

class FrontHome extends Component
{

    public function store($template_id, $template_title, $template_price)
    {
        Cart::add($template_id, $template_title, 1, $template_price)->associate('App\Models\Template');

        $this->dispatchBrowserEvent('added', ['message' => 'Added to Cart']);
        return redirect()->route('template.cart');
    }

    public function render()
    {
        $categories = TemplateCategory::where('status', 1)->get();

        return view('livewire.front-home', [
            'categories' => $categories,
        ]);
    }
}
