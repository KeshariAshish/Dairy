<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete()->nullable();
            $table->string('slot');
            $table->float('quantity')->default(0)->nullable();
            $table->float('available_quantity')->default(0)->nullable();
            $table->text('comment');
            $table->index('created_by');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->index('updated_by');
            $table->foreignId('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->date('date');
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
        Schema::dropIfExists('productions');
    }
}
