<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index()
    {
        return view('admin.settings', [
            'settings' => Setting::all()->pluck('value', 'key')
        ]);
    }
    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            Setting::setValue($key, $value);
        }

        return back()->with('success', 'Pengaturan berhasil diperbarui');
    }
}