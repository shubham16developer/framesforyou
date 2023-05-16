<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_users', function (Blueprint $table) {
            $table->id();
            $table->string('lead_id');
            $table->string('company_name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('mobile');
            $table->string('alt_mobile');
            $table->string('assign_user_id');
            $table->enum('is_delete', ['0', '1']);
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
        Schema::dropIfExists('lead_users');
    }
}
