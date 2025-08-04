<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
return new class extends Migration {
=======
return new class extends Migration
{
>>>>>>> 757e0377e7441c5f48492a3f6de9194ff7ea16ee
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('firstname');
            $table->string('lastname');
            $table->string('pseudo')->unique();
            $table->string('email')->nullable();
=======
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
>>>>>>> 757e0377e7441c5f48492a3f6de9194ff7ea16ee
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

<<<<<<< HEAD
=======
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

>>>>>>> 757e0377e7441c5f48492a3f6de9194ff7ea16ee
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
<<<<<<< HEAD
        Schema::dropIfExists('sessions');
    }
};
=======
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
>>>>>>> 757e0377e7441c5f48492a3f6de9194ff7ea16ee
