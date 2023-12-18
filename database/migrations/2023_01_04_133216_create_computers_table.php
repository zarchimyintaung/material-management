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
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('secondary_memory')->nullable();
            $table->string('primary_memory')->nullable();
            $table->boolean('is_dvd')->nullable()->default(0);
            $table->boolean('is_network')->nullable()->default(0);
            $table->string('system_model')->nullable();
            $table->string('generation')->nullable();
            $table->string('cpu')->nullable();
            $table->boolean('is_hdmi')->nullable()->default(0);
            $table->integer('usb')->nullable();
            $table->unsignedBigInteger('item_id');
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('items')->onDelete(('cascade'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computers');
    }
};
