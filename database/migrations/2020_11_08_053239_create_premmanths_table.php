<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremmanthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premmanths', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('amount_manth')->default('0');
            $table->text('discrption')->nullable();
            $table->string('disc2')->nullable();
            $table->unsignedBigInteger('prems_id');
            $table->unsignedBigInteger('c_name');
            $table->string('count')->default('1');
            $table->foreign('prems_id')->references('id')->on('prodects')->cascadeOnDelete();
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
        Schema::dropIfExists('premmanths');
    }
}
