<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Template;
use App\Models\TemplateCategory;
use App\Models\TemplateSubCategory;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\WithPagination;

class FrontTemplate extends Component
{
    // use WithPagination;
    // protected $paginationTheme = 'bootstrap';

    public $templates;

    public $title;
    public $type;
    public $min_price;
    public $max_price;
    public $rating;
    public $category = null;
    public $subcategories = null;
    public $subcategory_id;

    public function resetForm()
    {
        $this->type = '';
        $this->min_price = '';
        $this->max_price = '';
        $this->rating = '';
        $this->category = null;
        $this->subcategories = null;

        $this->mount();
    }

    public function clearSearch()
    {
        $this->title = '';

        if (empty($this->title) && (empty($this->min_price) || empty($this->max_price)) && empty($this->rating) && empty($this->type)) {
            $this->mount();
        }
    }

    public function clearCategory()
    {
        if (!empty($this->category)) {
            $this->category = null;
            $this->subcategories = null;
            $this->subcategory_id = '';

            $this->searching();
        }
    }

    public function clearRating()
    {
        if (!empty($this->rating)) {
            $this->rating = '';

            $this->searching();
        }
    }

    public function clearPrice()
    {
        if (!empty($this->min_price) || !empty($this->max_price)) {
            $this->min_price = '';
            $this->max_price = '';

            $this->searching();
        }
    }

    public function clearType()
    {
        if (!empty($this->type)) {
            $this->type = '';

            $this->searching();
        }
    }

    public function mount()
    {
        $this->templates = Template::where('status', 1)->get();
    }

    public function UpdatedCategory($template_category_id)
    {
        $this->subcategories = TemplateSubCategory::where([['template_category_id', $template_category_id], ['status', 1]])->get();
    }

    public function searching()
    {
        $template = Template::query();

        if (!empty($this->title)) {
            $template = $template->where('title', 'like', '%' . $this->title . '%');
        }

        if (!empty($this->min_price) && !empty($this->max_price)) {
            $template = $template->whereBetween('new_price', [$this->min_price, $this->max_price]);
        } elseif (!empty($this->min_price) && empty($this->max_price)) {
            $template = $template->where('new_price', '>=', $this->min_price);
        } elseif (empty($this->min_price) && !empty($this->max_price)) {
            $template = $template->where('new_price', '<=', $this->max_price);
        }

        if (!empty($this->rating)) {
            $template = $template->where('rating', '>=', $this->rating);
        }

        if (!empty($this->type)) {
            $template = $template->where('type', '=', $this->type);
        }

        if (!empty($this->subcategory_id)) {
            $template = $template->where('template_sub_category_id', $this->subcategory_id);
        }

        $this->templates = $template->get();
    }

    public function store($template_id, $template_title, $template_price)
    {
        Cart::add($template_id, $template_title, 1, $template_price)->associate('App\Models\Template');

        $this->dispatchBrowserEvent('added', ['message' => 'Added to Cart']);
        return redirect()->route('template.cart');
    }

    public function render()
    {
        $templateCategories = TemplateCategory::where('status', 1)->get();

        return view('livewire.front-template', [
            'templateCategories' => $templateCategories,
        ]);
    }
}
