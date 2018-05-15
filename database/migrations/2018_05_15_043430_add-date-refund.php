<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateRefund extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('refunds', function($table) {
        $table->string('date')->nullable();
         $table->integer('company_id')->unsigned();
        $table->foreign('company_id')->references('id')->on('compnays')
                ->onUpdate('cascade')->onDelete('cascade');
    }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('refunds', function($table) {
        $table->dropColumn('approve');
    });
    }
}
