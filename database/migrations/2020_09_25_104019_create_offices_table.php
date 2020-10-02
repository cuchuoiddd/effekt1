<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content_profile_vn')->nullable();
            $table->text('content_profile_en')->nullable();
            $table->string('image_profile')->nullable();

            $table->string('contact_lat')->nullable();
            $table->string('contact_long')->nullable();
            $table->text('content_contact_en')->nullable();
            $table->text('content_contact_vn')->nullable();

            $table->string('image_people')->nullable();

            $table->text('content_employment_vn')->nullable();
            $table->text('content_employment_en')->nullable();
            $table->string('image_employment')->nullable();

            $table->text('content_award_vn')->nullable();
            $table->text('content_award_en')->nullable();
            $table->string('image_award')->nullable();

            $table->string('image_client')->nullable();
            $table->text('image_client_logo')->nullable();

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
        Schema::dropIfExists('offices');
    }
}
