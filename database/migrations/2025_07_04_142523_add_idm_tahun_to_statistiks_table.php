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
        Schema::table('statistiks', function (Blueprint $table) {
            // Menambahkan kolom tahun setelah kolom 'idm_ike'
            $table->year('idm_tahun')->default(date('Y'))->after('idm_ike');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('statistiks', function (Blueprint $table) {
            //
        });
    }
};
