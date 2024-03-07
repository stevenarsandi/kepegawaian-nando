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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pelamar_id')->nullable();
            $table->string('nama',100)->nullable();
            $table->string('divisi', 50)->nullable();
            $table->string('jabatan', 50)->nullable();
            $table->string('jeniskelamin', 50)->nullable();
            $table->string('alamat',100)->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('notelepon',100)->nullable();
            $table->string('nik',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('status',50)->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
