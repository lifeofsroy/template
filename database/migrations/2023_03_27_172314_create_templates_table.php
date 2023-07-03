<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('template_sub_category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('short');
            $table->string('preview')->nullable();
            $table->string('source_logo')->nullable();
            $table->string('source_url')->nullable();
            $table->longText('desc');
            $table->string('rating');
            $table->string('old_price')->nullable();
            $table->string('new_price')->nullable();
            $table->string('type')->nullable();
            $table->string('thumb');
            $table->string('image');
            $table->text('slider')->nullable();
            $table->string('responsive')->nullable();
            $table->string('interface')->nullable();
            $table->string('blocks')->nullable();
            $table->string('browser')->nullable();
            $table->string('versions')->nullable();
            $table->string('files')->nullable();
            $table->string('framework')->nullable();
            $table->string('document')->nullable();
            $table->text('note')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates');
    }
};
