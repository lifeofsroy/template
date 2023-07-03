<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Template;

class FrontTemplatePreview extends Component
{
    public $template_slug;

    public function mount($template_slug)
    {
        $this->template_slug = $template_slug;
    }

    public function render()
    {
        $template = Template::where('slug', $this->template_slug)->first();

        return view('livewire.front-template-preview',[
            'template' => $template,
        ])->layout('layouts.preview');
    }
}
