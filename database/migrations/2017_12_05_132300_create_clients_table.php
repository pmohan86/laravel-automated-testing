<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('clients_id');
            $table->string('name', 100);
            $table->enum('gender', ['male', 'female', 'others']);
            $table->date('dob');
            $table->string('phone', 35);
            $table->string('email', 100);
            $table->text('address');
            $table->string('nationality', 100);
            $table->string('education', 15);
            $table->string('preferred_contact_mode', 15);
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
        Schema::dropIfExists('clients');
    }
}
