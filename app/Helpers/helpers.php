<?php

if (!function_exists('formatContent')) {
    /**
     * Fungsi untuk memformat teks:
     * 1. Memberi warna pada angka list (e.g., "1.", "2.").
     * 2. Mengubah baris baru (newline) menjadi tag <br>.
     */
    function formatContent($text)
    {
        if (empty($text)) {
            return '';
        }

        // Pola regex untuk menemukan angka yang diikuti titik (e.g., "1.", "2.", "10.")
        $pattern = '/(\d+\.)/i';

        // Teks pengganti: angka yang ditemukan akan dibungkus dengan span berwarna
        // Anda bisa mengganti 'text-blue-600' dengan warna lain dari Tailwind CSS
        $replacement = '<span class="font-bold text-blue-600">$1</span>';

        // 1. Ganti angka dengan versi yang sudah berwarna menggunakan regex
        $formattedText = preg_replace($pattern, $replacement, $text);

        // 2. Ubah karakter ganti baris (\n) menjadi tag <br>
        $finalText = nl2br($formattedText);

        return $finalText;
    }
}