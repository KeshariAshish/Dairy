<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->nullable();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete()->nullable();
            $table->float('total_quantity');
            $table->float('price');
            $table->float('total_amount')->nullable();
            $table->float('paid_amount')->nullable();
            $table->float('due_amount')->nullable();
            $table->tinyInteger('is_paid')->default(0);
            $table->string('payment_mode');
            $table->index('payment_received_by');
            $table->foreignId('payment_received_by')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->index('created_by');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('invoices');
    }
}
