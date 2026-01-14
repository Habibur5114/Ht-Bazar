<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $setting = Setting::first();

        if (! $setting) {

            $setting = new Setting;
        }

        $data = $request->only([
            'site_name',
            'site_title',
            'site_logo',
            'admin_logo',
            'favicon',
            'seo_meta_description',
            'seo_keywords',
            'seo_image',
            'app_mode',
            'facebook_client_id',
            'facebook_client_secret',
            'facebook_callback_url',
            'google_client_id',
            'google_client_secret',
            'google_callback_url',
            'copyright_text',
            'facebook_url',
            'youtube_url',
            'twitter_url',
            'linkedin_url',
            'telegram_url',
            'instagram_url',
            'map_link',
            'email',
            'whatsapp_number',
            'phone_no',
            'support_email',
            'address',
            'invoice_footer_text',
            'stripe_enable',
            'stripe_mode',
            'stripe_publishable_key',
            'stripe_secret_key',
            'paypal_enable',
            'paypal_mode',
            'paypal_client_id',
            'paypal_client_secret',
        ]);

        foreach (['site_logo', 'admin_logo', 'favicon', 'seo_image'] as $fileField) {
            if ($request->hasFile($fileField)) {
                $file = $request->file($fileField);
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move(public_path("uploads/settings/{$fileField}"), $filename);
                $data[$fileField] = "uploads/settings/{$fileField}/".$filename;
            }
        }

        $setting->fill($data);
        $setting->save();

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
