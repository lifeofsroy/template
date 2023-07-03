<?php

namespace App\Models;

use App\Models\User;
use App\Models\Template;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'rating',
        'desc',
        'template_id',
        'user_id',
        'status',
    ];

    protected $table = "reviews";

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
