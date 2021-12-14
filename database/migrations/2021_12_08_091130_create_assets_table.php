<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('asset_name')->nullable();
            $table->longText('asset_description')->nullable();
            $table->string('asset_quantity')->nullable();
            $table->string('asset_price')->nullable();
            $table->string('asset_img')->nullable();
            $table->string('asset_video')->nullable();
            $table->string('post_type')->default('publish')->comment('publish, draft');
            $table->boolean('is_delete')->default(0)->comment('1 Yes, 0 No');
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
        Schema::dropIfExists('assets');
    }
}
