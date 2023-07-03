<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TemplateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('template_categories')->insert([
            'name' => 'Multi Page Templates',
            'slug' => 'multi-page-templates',
            'desc' => 'the examples used in this post are startups that specifically asked for feedback on their respec-tive websites.',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('template_categories')->insert([
            'name' => 'Single Page Templates',
            'slug' => 'single-page-templates',
            'desc' => 'the examples used in this post are startups that specifically asked for feedback on their respec-tive websites.',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
