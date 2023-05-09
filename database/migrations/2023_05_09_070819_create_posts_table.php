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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('overview', 500);
            $table->string('image', 100)->nullable();
            $table->string('image_title', 100);
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('userss_id');
            $table->foreignId('shops_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
