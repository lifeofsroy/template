<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Faq;
use App\Models\Review;
use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->create([
        //     'name' => 'Suman Roy',
        //     'email' => 'sroywebstudio@gmail.com',
        //     'password' => Hash::make('SUMAN@78626roy'),
        // ]);

        User::factory(20)->create();

        $this->call([
            TemplateCategorySeeder::class,
            TemplateSubCategorySeeder::class,
        ]);

        Template::factory(50)->create();
        Review::factory(80)->create();
        Faq::factory(50)->create();
    }
}
