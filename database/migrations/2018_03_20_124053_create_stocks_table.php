<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number_shamar');
$table->string('date');
            $table->string('pass_name');

            $table->string('ticket_number')->unique();
            $table->string('sector');
            $table->integer('amount');
            $table->integer('total')->nullable();
            $table->string('amount_type');
            $table->integer('ok')->nullable();
            $table->integer('refund')->nullable();
            
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
        Schema::dropIfExists('stocks');
    }
}
