<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'cname',
        'cemail',
        'cphone',
        'cdesc',
        'template_id',
    ];

    protected $table = "checkouts";

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
