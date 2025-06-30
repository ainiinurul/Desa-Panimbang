<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil SEMUA setting dari database, urutkan berdasarkan ID
        $settings = Setting::orderBy('id')->get(); 

        // Kirim koleksi 'settings' ke view
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // Ambil semua input dari form
        $inputs = $request->except('_token');

        // Lakukan perulangan untuk setiap input yang dikirim
        foreach ($inputs as $key => $value) {
            // Jika input adalah file, tangani secara terpisah
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $path = $file->store('settings', 'public'); // Simpan file ke storage/app/public/settings

                // Update path file di database
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $path]
                );
            } else {
                // Jika bukan file, langsung update nilainya
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
        }

        return redirect()->route('admin.settings.update')->with('success', 'Pengaturan berhasil diperbarui!');
    }
}