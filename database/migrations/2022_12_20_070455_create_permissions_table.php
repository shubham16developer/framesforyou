<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('add_group');
            $table->string('edit_group');
            $table->string('delete_group');
            $table->string('add_user');
            $table->string('edit_user');
            $table->string('delete_user');
            $table->string('add_manager');
            $table->string('edit_manager');
            $table->string('delete_manager');
            $table->string('add_lead');
            $table->string('edit_lead');
            $table->string('delete_lead');
            $table->string('add_media');
            $table->string('edit_media');
            $table->string('delete_media');
            $table->string('add_role');
            $table->string('edit_role');
            $table->string('delete_role');
            $table->string('assign_role');
            $table->string('ivr');
            $table->string('call_log');
            $table->string('whatsapp');
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
        Schema::dropIfExists('permissions');
    }
}
