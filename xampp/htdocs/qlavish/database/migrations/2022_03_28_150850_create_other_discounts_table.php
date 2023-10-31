<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('other_discount_value');
            $table->string('other_discount_title');
            $table->string('other_discount_text');
            $table->text('other_discount_image');
            $table->text('other_discount_thumbnail');
            $table->unsignedBigInteger('admin_id')->unsigned();
            $table->foreign('admin_id')
            ->references('id')
            ->on('admins')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('other_discount_limit');
            $table->dateTime('date_valid');
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
        Schema::dropIfExists('other_discounts');
    }
}
