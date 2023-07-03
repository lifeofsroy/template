<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TemplateSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('template_sub_categories')->insert([
            'name' => 'Authentication',
            'slug' => 'authentication',
            'status' => 1,
            'template_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('template_sub_categories')->insert([
            'name' => 'Coming Soon',
            'slug' => 'coming-soon',
            'status' => 1,
            'template_category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('template_sub_categories')->insert([
            'name' => 'Ecommerce',
            'slug' => 'ecommerce',
            'status' => 1,
            'template_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('template_sub_categories')->insert([
            'name' => 'Email',
            'slug' => 'email',
            'status' => 1,
            'template_category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('template_sub_categories')->insert([
            'name' => 'Form',
            'slug' => 'form',
            'status' => 1,
            'template_category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('template_sub_categories')->insert([
            'name' => 'Service',
            'slug' => 'service',
            'status' => 1,
            'template_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('template_sub_categories')->insert([
            'name' => 'Invoice',
            'slug' => 'invoice',
            'status' => 1,
            'template_category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
