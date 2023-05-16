<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIvrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ivrs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('opening_hour_greeting_type');
            $table->string('opening_hour_greeting_textarea');
            $table->string('opening_hour_greeting_previous_check');
            $table->string('opening_hour_greeting_recording_id');
            $table->string('opening_hour_greeting_new_recording_id');
            $table->string('forward_group');
            $table->string('call_type');
            $table->string('opening_hour_voice_mail_check');
            $table->string('opening_voice_call_previous_check');
            $table->string('opening_voice_call_recording_id');
            $table->string('opening_voice_call_new_recording_id');
            $table->string('closing_hour_greetings_type');
            $table->string('closing_hour_greetings_textarea');
            $table->string('closing_hour_greeting_previous_check');
            $table->string('closing_hour_greeting_recording_id');
            $table->string('closing_hour_greeting_new_recording_id');
            $table->string('closing_hour_voice_mail_check');
            $table->string('closing_voice_call_previous_check');
            $table->string('closing_voice_call_recording_id');
            $table->string('closing_voice_call_new_recording_id');
            $table->string('number_id');
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
        Schema::dropIfExists('ivrs');
    }
}
