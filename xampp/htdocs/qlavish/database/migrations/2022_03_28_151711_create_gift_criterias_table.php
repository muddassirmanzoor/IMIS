<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_criterias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('criteria_title');
            $table->string('criteria_description');
            $table->integer('criteria_kms');
            $table->integer('criteria_no_of_days');
            $table->integer('criteria_amount');
            $table->dateTime('criteria_valid');
            $table->tinyInteger('is_active');
            $table->unsignedBigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')
            ->references('id')
            ->on('admins')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('gift_criterias');
    }
}
