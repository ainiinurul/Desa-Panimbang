<?php
// /app/helpers.php

use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Fungsi helper untuk mengambil nilai dari tabel settings.
     */
    function setting($key, $default = null)
    {
        // 'static' digunakan agar kita tidak perlu query ke database berulang-ulang
        // pada satu request yang sama.
        static $settings;

        if (is_null($settings)) {
            // Jika variabel $settings belum ada, ambil semua data dari database
            // dan simpan dengan 'key' sebagai kuncinya.
            $settings = Setting::all()->keyBy('key');
        }

        // Kembalikan nilai dari setting berdasarkan key yang diminta.
        // Jika tidak ada, kembalikan nilai default.
        return $settings->get($key)->value ?? $default;
    }
}