<?php

namespace App\Models;

use App\Models\TemplateSubCategory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemplateCategory extends Model
{
    use HasFactory;
    use HasSEO;

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    protected $table = "template_categories";

    public function templateSubCategories()
    {
        return $this->hasMany(TemplateSubCategory::class);
    }
}
