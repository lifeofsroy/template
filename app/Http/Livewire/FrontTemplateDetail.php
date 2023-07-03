<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;
use App\Models\Checkout;
use App\Models\Template;
use App\Mail\CheckoutUserMail;
use App\Mail\CheckoutAdminMail;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;

class FrontTemplateDetail extends Component
{
    public $template_slug;

    public function mount($template_slug)
    {
        $this->template_slug = $template_slug;
    }

    public $user_id;
    public $template_id;
    public $desc;
    public $rating;

    public function resetInput()
    {
        $this->desc = null;
        $this->rating = null;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'rating' => 'required',
            'desc' => 'required|max:200',
        ]);
    }

    public function reviewForm()
    {
        $this->validate([
            'rating' => 'required',
            'desc' => 'required|max:200',
        ]);

        $template = Template::where('slug', $this->template_slug)->first();

        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->template_id = $template->id;
        $review->rating = $this->rating;
        $review->desc = $this->desc;

        $review->save();

        $this->resetInput();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('added', ['message' => 'Review Submitted']);
    }

    protected $messages = [
        'rating.required' => 'Rating is Required',
        'desc.required' => 'Cannot submit empty Review',
        'desc.max' => 'Less than 200 characters',
    ];

    public function store($template_id, $template_title, $template_price)
    {
        Cart::add($template_id, $template_title, 1, $template_price)->associate('App\Models\Template');

        $this->dispatchBrowserEvent('added', ['message' => 'Added to Cart']);
        return redirect()->route('template.cart');
    }

    public function render()
    {
        $template = Template::where('slug', $this->template_slug)->first();

        return view('livewire.front-template-detail', [
            'template' => $template,
        ]);
    }
}
