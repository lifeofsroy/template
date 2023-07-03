<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Checkout;
use App\Models\Template;
use App\Mail\CheckoutUserMail;
use App\Mail\CheckoutAdminMail;
use App\Models\TemplateCategory;
use Illuminate\Support\Facades\Mail;

class FrontTemplateByCategory extends Component
{
    public $category_slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }

    public $cname;
    public $cemail;
    public $cphone;
    public $cwhatsapp;
    public $cdesc;
    public $tempid = null;

    public function resetCheckout()
    {
        $this->cname = '';
        $this->cemail = '';
        $this->cphone = '';
        $this->cwhatsapp = '';
        $this->cdesc = '';
    }

    public function closeCheckoutModal()
    {
        $this->resetCheckout();
        $this->resetErrorBag();
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'cname' => 'required',
            'cemail' => 'required|email',
            'cphone' => 'required|numeric|digits:10',
            'cwhatsapp' => 'required|numeric|digits:10',
            'cdesc' => 'nullable|max:500',
        ]);
    }

    public function updateTempid($tempid){
        $this->tempid = $tempid;
    }

    public function checkoutForm()
    {
        $template = Template::where('id', $this->tempid)->first();

        $this->validate([
            'cname' => 'required',
            'cemail' => 'required|email',
            'cphone' => 'required|numeric|digits:10',
            'cwhatsapp' => 'required|numeric|digits:10',
            'cdesc' => 'nullable|max:500',
        ]);

        $checkout = new Checkout();
        $checkout->template_id = $template->id;
        $checkout->cname = $this->cname;
        $checkout->cemail = $this->cemail;
        $checkout->cphone = $this->cphone;
        $checkout->cwhatsapp = $this->cwhatsapp;
        $checkout->cdesc = $this->cdesc;


        $checkout->save();

        $template_url = route('template.detail', ['template_slug' => $template->slug]);

        Mail::to('sroywebstudio@gmail.com')->send(new CheckoutAdminMail($template->title, $this->cname, $this->cemail, $this->cphone, $this->cwhatsapp, $this->cdesc, $template_url));
        Mail::to($this->cemail)->send(new CheckoutUserMail($template->title, $this->cname, $this->cemail, $this->cphone, $this->cwhatsapp, $this->cdesc, $template_url));

        $this->dispatchBrowserEvent('added', ['message' => 'Sent Successfully']);
        $this->resetCheckout();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('close-checkout-modal');
    }

    protected $messages = [
        'cname.required' => 'Name is Required',
        'cemail.required' => 'Email is Required',
        'cemail.email' => 'Invalid Email',
        'cphone.required' => 'Phone is Required',
        'cphone.numeric' => 'Invalid Phone No',
        'cphone.digits' => '10 digits only',
        'cwhatsapp.required' => 'Whatsapp is Required',
        'cwhatsapp.numeric' => 'Invalid Whatsapp No',
        'cwhatsapp.digits' => '10 digits only',
        'cdesc.max' => 'Max 500 characters',
    ];

    public function render()
    {
        $category = TemplateCategory::where('slug', $this->category_slug)->first();
        $subcategories = $category->templateSubCategories->where('status', 1);

        $latests = Template::where('status', 1)->latest()->take(5)->get();

        return view('livewire.front-template-by-category', [
            'category' => $category,
            'latests' => $latests,
            'subcategories' => $subcategories,
        ]);
    }
}
