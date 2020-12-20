<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('c_name');
            $table->string('prodect_name','255')->unique();
            $table->string('discrption','255')->nullable();
            $table->string('teker_name','255')->nullable();
            $table->string('teker_phone','255')->nullable();
            $table->string('teker_id','255')->nullable();
            $table->decimal('prodect_price',8,2);
            $table->decimal('amount_pay',8,2)->default('0');
            $table->integer('prem_lemt');
            $table->decimal('rem_amount',8,2);
            $table->decimal('prem_manth',8,2);
            $table->decimal('precent',8,2);
            $table->date('date');
            $table->foreign('c_name')->references('id')->on('customers')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prodects');
    }
}
