<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagePostTemplateOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_post_template_ones', function (Blueprint $table) {
            $table->id();
            $table->integer('blogger_id');
            $table->integer('template_id');
            $table->string('post_type');
            $table->integer('post_status')->default(0);
            $table->string('title');
            $table->string('slug');
            $table->string('intro_header');
            $table->longText('intro_description');
            $table->string('outro_header');
            $table->longText('outro_description');

            $table->string('headline1');
            $table->string('headline2');
            $table->string('headline3');
            $table->string('headline4');
            $table->longText('description1');
            $table->longText('description2');
            $table->longText('description3');
            $table->longText('description4');

            $table->string('fimage');
            $table->string('article_image');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('color1')->nullable();
            $table->string('color2')->nullable();
            $table->string('color3')->nullable();
            $table->string('color4')->nullable();
            $table->string('color5')->nullable();

            $table->json('product_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_post_template_ones');
    }
}
