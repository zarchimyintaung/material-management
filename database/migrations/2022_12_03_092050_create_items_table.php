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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('department_id');
            $table->boolean('is_repair')->nullable()->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete(('cascade'));
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete(('cascade'));
            $table->foreign('department_id')->references('id')->on('departments')->onDelete(('cascade'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
