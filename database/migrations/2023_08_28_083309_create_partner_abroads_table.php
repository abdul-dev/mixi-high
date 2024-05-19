<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerAbroadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_abroads', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('abreviation')->nullable();
            $table->string('owner')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('street')->nullable();
            $table->string('town')->nullable();
            $table->string('post_code')->nullable();
            $table->text('remarks')->nullable();
            $table->foreignId('country_id')->nullable()->constrained('countries');

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
        Schema::dropIfExists('partner_abroads');
    }
}
