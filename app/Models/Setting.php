<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
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
    ];

    protected $casts = [

         'stripe_enable' => 'boolean',
         'paypal_enable' => 'boolean',
    ];
}
