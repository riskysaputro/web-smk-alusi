<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
        {
            Schema::create('students', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->string('nisn')->unique();
                $table->string('nik')->unique();
                $table->string('phone');
                $table->text('address');
                $table->text('school');
                $table->text('schooladdress');
                $table->enum('gender', ['Laki-Laki', 'Perempuan']);
                $table->date('birth_date');
                $table->string('major'); // Bisa diubah jadi foreign key jika jurusan dinamis
                $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};