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
        Schema::create('settings', function (Blueprint $table) {
           $table->id();
            $table->string('site_name')->nullable();
            $table->string('site_title')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('admin_logo')->nullable();
            $table->string('favicon')->nullable();

            $table->text('seo_meta_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->string('seo_image')->nullable();

            $table->string('app_mode')->default('live');

            $table->string('facebook_client_id')->nullable();
            $table->string('facebook_client_secret')->nullable();
            $table->string('facebook_callback_url')->nullable();

            $table->string('google_client_id')->nullable();
            $table->string('google_client_secret')->nullable();
            $table->string('google_callback_url')->nullable();

            $table->string('copyright_text')->nullable();

            $table->string('facebook_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('telegram_url')->nullable();
            $table->string('instagram_url')->nullable();

            $table->string('map_link')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('support_email')->nullable();
            $table->string('address')->nullable();

            $table->text('invoice_footer_text')->nullable();

            $table->boolean('stripe_enable')->default(false);
            $table->string('stripe_mode')->default('live');
            $table->string('stripe_publishable_key')->nullable();
            $table->string('stripe_secret_key')->nullable();

            $table->boolean('paypal_enable')->default(false);
            $table->string('paypal_mode')->default('sandbox');
            $table->string('paypal_client_id')->nullable();
            $table->string('paypal_client_secret')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
