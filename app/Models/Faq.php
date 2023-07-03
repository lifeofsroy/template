<?php

namespace App\Models;

use App\Models\Template;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'template_id',
        'status',
    ];

    protected $table = "faqs";

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
