<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('menu_id')->nullable()->constrained();
            $table->foreignId('role_id')->nullable()->constrained();
            $table->boolean('can_add')->default(1);
            $table->boolean('can_view')->default(1);
            $table->boolean('can_edit')->default(1);
            $table->boolean('can_delete')->default(1);

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
        Schema::dropIfExists('role_permissions');
    }
}
