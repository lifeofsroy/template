<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\TemplateSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Template>
 */
class TemplateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->unique()->realText(20);
        $slug = Str::slug($title, "-");
        $thumbName = 'template/thumb/' . 'thumb' . $this->faker->numberBetween(1, 8) . '.jpg';

        return [
            'title' => $title,
            'slug' => $slug,
            'template_sub_category_id' => $this->faker->randomElement(TemplateSubCategory::pluck('id')),
            'short' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'preview' => 'https://www.photopea.com/',
            'source_logo' => 'template/source/logo.png',
            'source_url' => 'https://themeforest.net',
            'desc' => $this->faker->realText(1000),
            'rating' => $this->faker->numberBetween(1, 5),
            'old_price' => $this->faker->numberBetween(1000, 5000),
            'new_price' => $this->faker->numberBetween(1000, 5000),
            'type' => $this->faker->randomElement(['special', 'new', 'free', 'unique', 'premium']),
            'thumb' => $thumbName,
            'image' => 'template/image/image.jpg',
            'responsive' => 'Desktop, Mobile, Tablet',
            'interface' => 'Modern',
            'blocks' => 'Yes',
            'browser' => 'Chrome, Edge, Firefox, Opera, Safari',
            'versions' => 'WordPress 4.5 WordPress 4.5.1 WordPress 4.5.2 WordPress 4.5.x WordPress 4.6 WordPress 4.6.1 WordPress 4.7.x WordPress 4.8.x WordPress 4.9.x WordPress 5.0.x WordPress 5.1.x WordPress 5.2.x',
            'files' => 'CSS Files, JS Files, Layered, PSD, PHP Files',
            'framework' => $this->faker->randomElement(['Bootstrap', 'Tailwind', 'Vanilla CSS']),
            'document' => 'Well Documented',
            'note' => 'Images are not include with main files, They are used for preview purpose only',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
