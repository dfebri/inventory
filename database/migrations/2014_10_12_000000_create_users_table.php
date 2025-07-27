<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('role_id');
            $table->string('user_nmlengkap');
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_foto');
            $table->string('user_password');
            // $table->rememberToken();
            // $table->string('rememberToker');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user');
    }
};
