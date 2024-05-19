<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('host_families', function (Blueprint $table) {
            $table->id();

            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('father_dob')->nullable();
            $table->date('mother_dob')->nullable();
            $table->string('father_profession')->nullable();
            $table->string('mother_profession')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('children')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('post_code')->nullable();
            $table->foreignId('local_coordinator_id')->nullable();
            $table->foreignId('airport_id')->nullable()->constrained('airports');
            $table->string('bank_iban')->nullable();


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
        Schema::dropIfExists('host_families');
    }
}
