<?php

namespace App\Models;

use App\Models\Template;
use App\Models\TemplateCategory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemplateSubCategory extends Model
{
    use HasFactory;
    use HasSEO;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'template_category_id',
    ];

    protected $table = "template_sub_categories";

    public function templateCategory()
    {
        return $this->belongsTo(TemplateCategory::class);
    }

    public function templates()
    {
        return $this->hasMany(Template::class);
    }
}
