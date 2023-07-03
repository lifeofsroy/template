<?php

namespace App\Models;

use App\Models\Faq;
use Spatie\Tags\Tag;
use App\Models\Review;
use App\Models\Checkout;
use Spatie\Tags\HasTags;
use Spatie\MediaLibrary\HasMedia;
use App\Models\TemplateSubCategory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Template extends Model implements HasMedia
{
    use HasFactory;
    use HasSEO;
    use HasTags;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'template_sub_category_id',
        'short',
        'preview',
        'source_logo',
        'source_url',
        'desc',
        'rating',
        'old_price',
        'new_price',
        'type',
        'thumb',
        'image',
        'slider',
        'responsive',
        'interface',
        'blocks',
        'browser',
        'versions',
        'files',
        'framework',
        'document',
        'note',
        'status',
    ];

    protected $table = "templates";

    public function templateSubCategory()
    {
        return $this->belongsTo(TemplateSubCategory::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    public function checkouts()
    {
        return $this->hasMany(Checkout::class);
    }
}
