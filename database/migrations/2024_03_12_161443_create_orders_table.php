<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('user_delivery_address_id')->constrained();
            $table->decimal('sub_total', 9, 2)->default(0);
            $table->decimal('total', 9, 2)->default(0);
            $table->decimal('tax', 9, 2)->default(0);
            $table->string('status')->default('PENDING');
            $table->string('shipping')->default('FREE');

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
        Schema::dropIfExists('orders');
    }
}
