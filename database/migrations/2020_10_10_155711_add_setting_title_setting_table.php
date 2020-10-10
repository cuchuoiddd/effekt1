<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSettingTitleSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('favicon')->nullable();
            $table->string('title_vn')->comment('meta title')->nullable();
            $table->string('title_en')->comment('meta title')->nullable();
            $table->string('description_vn')->comment('meta description')->nullable();
            $table->string('description_en')->comment('meta description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
}
