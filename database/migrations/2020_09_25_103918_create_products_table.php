<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->text('images');
            $table->string('title_vn');
            $table->string('title_en');
            $table->text('content_vn');
            $table->text('content_en');
            $table->string('project_name_vn')->nullable();
            $table->string('project_name_en')->nullable();
            $table->string('typology_vn')->nullable();
            $table->string('typology_en')->comment('Phân loại')->nullable();
            $table->string('location_vn')->nullable();
            $table->string('location_en')->comment('vị trí')->nullable();
            $table->integer('year')->comment('năm')->nullable();
            $table->string('status_vn')->comment()->nullable();
            $table->string('status_en')->comment('trạng thái')->nullable();
            $table->string('size_vn')->comment()->nullable();
            $table->string('size_en')->comment('kích thước')->nullable();
            $table->string('client_vn')->comment()->nullable();
            $table->string('client_en')->comment('khách hàng')->nullable();
            $table->string('collaborator_vn')->comment()->nullable();
            $table->string('collaborator_en')->comment('Cộng tác viên')->nullable();
            $table->string('design_team')->comment('team thiết kế')->nullable();
            $table->string('lat')->comment('vị trí bản đồ')->nullable();
            $table->string('long')->comment('vị trí bản đồ')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('products');
    }
}
