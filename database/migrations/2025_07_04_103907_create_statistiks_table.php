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
        Schema::create('statistiks', function (Blueprint $table) {
            $table->id();

            // 1. Kependudukan
            $table->integer('penduduk_pria')->default(0);
            $table->integer('penduduk_wanita')->default(0);
            $table->integer('usia_anak')->default(0); // 0-14
            $table->integer('usia_produktif')->default(0); // 15-64
            $table->integer('usia_lansia')->default(0); // 65+

            // 2. Pendidikan
            $table->integer('pendidikan_sd')->default(0);
            $table->integer('pendidikan_smp')->default(0);
            $table->integer('pendidikan_sma')->default(0);
            $table->integer('pendidikan_pt')->default(0); // Perguruan Tinggi
            $table->integer('fasilitas_paud')->default(0);
            $table->integer('fasilitas_sd')->default(0);
            $table->integer('fasilitas_smp')->default(0);
            $table->integer('fasilitas_sma')->default(0);

            // 3. Sarana Prasarana
            $table->integer('sarana_puskesmas')->default(0);
            $table->integer('sarana_posyandu')->default(0);
            $table->integer('sarana_bidan')->default(0);
            $table->integer('sarana_apotek')->default(0);
            $table->integer('sarana_masjid')->default(0);
            $table->integer('sarana_mushola')->default(0);
            $table->integer('sarana_gereja')->default(0);
            $table->integer('sarana_pura')->default(0);
            $table->decimal('sarana_jalan_km', 8, 2)->default(0);
            $table->integer('sarana_jembatan')->default(0);
            $table->decimal('sarana_irigasi_km', 8, 2)->default(0);
            $table->integer('sarana_bts')->default(0);

            // 4. APB Desa (Anggaran) - gunakan bigInteger untuk nilai uang yang besar
            $table->bigInteger('apb_pad')->default(0);
            $table->bigInteger('apb_dana_desa')->default(0);
            $table->bigInteger('apb_alokasi_dana')->default(0);
            $table->bigInteger('apb_bantuan')->default(0);

            // 5. Posyandu
            $table->integer('posyandu_jumlah_balita')->default(0);
            $table->integer('posyandu_jumlah_bumil')->default(0); // Ibu Hamil
            $table->integer('posyandu_jumlah_posyandu')->default(0);
            // Untuk data chart balita, kita gunakan JSON
            $table->json('posyandu_chart_pria')->nullable();
            $table->json('posyandu_chart_wanita')->nullable();

            // 6. Indeks Desa Membangun (IDM)
            $table->decimal('idm_skor', 5, 2)->default(0);
            $table->string('idm_status')->nullable();
            $table->string('idm_target')->nullable();
            $table->decimal('idm_skor_minimal', 5, 2)->default(0);
            $table->decimal('idm_ikl', 5, 2)->default(0); // Indeks Ketahanan Lingkungan
            $table->decimal('idm_iks', 5, 2)->default(0); // Indeks Ketahanan Sosial
            $table->decimal('idm_ike', 5, 2)->default(0); // Indeks Ketahanan Ekonomi

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistiks');
    }
};
