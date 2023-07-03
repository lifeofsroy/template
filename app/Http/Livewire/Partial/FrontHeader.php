<?php

namespace App\Http\Livewire\Partial;

use Livewire\Component;
use App\Models\Template;
use App\Models\TemplateSubCategory;

class FrontHeader extends Component
{
    public $templates;
    public $title;

    public function mount()
    {
        $this->title = '';
        $this->templates = [];
    }

    public function searchTemplate()
    {
        $template = Template::query();

        if (!empty($this->title)) {
            $template = $template->where('title', 'like', '%' . $this->title . '%');
        }

        $this->templates = $template->get();
        // $this->dispatchBrowserEvent('open-modal');
    }

    public function render()
    {
        $subCategories = TemplateSubCategory::where('status', 1)->get();

        return view('livewire.partial.front-header', [
            'subCategories' => $subCategories,
        ]);
    }
}
