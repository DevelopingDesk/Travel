<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('check_number');
            $table->string('voture_number');
            $table->string('bank_name');
          $table->integer('check_amount');
            $table->string('check_type');

            $table->string('date');
             $table->integer('company_id')->unsigned();

              $table->foreign('company_id')->references('id')->on('compnays')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('checks');
    }
}
