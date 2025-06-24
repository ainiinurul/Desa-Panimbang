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
        $settings = Setting::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if ($setting) {
                if ($setting->type == 'image' && $request->hasFile($key)) {
                    // Hapus gambar lama
                    if ($setting->value) {
                        Storage::disk('public')->delete($setting->value);
                    }
                    // Upload gambar baru
                    $path = $request->file($key)->store('settings-images', 'public');
                    $setting->value = $path;
                } else if ($setting->type != 'image') {
                    $setting->value = $value;
                }
                $setting->save();
            }
        }
        return back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}