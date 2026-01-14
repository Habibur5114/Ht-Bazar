@extends('admin.master')
@section('settingMenuOpen', 'menu-open')
@section('settingActive', 'active')
@section('settings', 'active')
@section('title') {{ $title ?? 'admin Create' }} @endsection
@section('content')
    <div class="mt-5">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 m-2">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3 ">
                                    <h3 class="card-title"><b>General Settings</b></h3>

                                </div>
                                <hr>
                                <div class="card-body">
                                    <form action="{{ route('admin.settings.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-3">
                                                <div class="image">
                                                    <img src="{{ asset($settings?->site_logo) }}" width="120"
                                                        alt="Site Logo">
                                                </div>
                                                <div class="mb-3">

                                                    <label class="form-label">Site Logo <span
                                                            style="color: red">(Recommended size : 180x60)</span></label>
                                                    <input type="file" name="site_logo" class="form-control "
                                                        placeholder="Enter ">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="image">
                                                    <img src="{{ asset($settings?->admin_logo) }}" width="120"
                                                        alt="admin_logo">
                                                </div>
                                                <div class="mb-3">

                                                    <label class="form-label">Admin Logo <span
                                                            style="color: red">(Recommended size : 720x680)</span></label>
                                                    <input type="file" name="admin_logo" class="form-control "
                                                        placeholder="Enter ">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="image">
                                                    <img src="{{ asset($settings?->seo_image) }}" width="120"
                                                        alt="seo_image">
                                                </div>
                                                <div class="mb-3">

                                                    <label class="form-label">SEO Image<span style="color: red">(Recommended
                                                            size : 180x60)</span></label>
                                                    <input type="file" name="seo_image" class="form-control "
                                                        placeholder="Enter ">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="image">
                                                    <img src="{{ asset($settings?->favicon) }}" width="120"
                                                        alt="favicon">
                                                </div>
                                                <div class="mb-3">

                                                    <label class="form-label">Favicon <span style="color: red">(Recommended
                                                            size : 180x60)</span></label>
                                                    <input type="file" name="favicon" class="form-control "
                                                        placeholder="Enter ">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">App Name</span></label>
                                                    <input type="text" name="site_name"
                                                        value="{{ $settings?->site_name }}" class="form-control "
                                                        placeholder="Enter App Name">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Site Title<span
                                                            style="color: red">*</span></label>
                                                    <input type="text" name="site_title"
                                                        value="{{ $settings?->site_title }}" class="form-control "
                                                        placeholder="Enter Site Title">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Email<span style="color: red">*</span></label>
                                                    <input type="email" name="Email" value="{{ $settings?->email }}"
                                                        class="form-control " placeholder="habiburrahman@gmail.com">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Support Email<span
                                                            style="color: red">*</span></label>
                                                    <input type="email" name="support_email"
                                                        value="{{ $settings?->support_email }}" class="form-control "
                                                        placeholder="super@gmail.com">
                                                </div>
                                            </div>


                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone<span
                                                            style="color: red">*</span></label>
                                                    <input type="text" name="phone_no"
                                                        value="{{ $settings?->phone_no }}" class="form-control"
                                                        placeholder="01985625114">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">whatsapp_number<span
                                                            style="color: red">*</span></label>
                                                    <input type="text" name="whatsapp_number"
                                                        value="{{ $settings?->whatsapp_number }}" class="form-control"
                                                        placeholder="01985625114">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">invoice footer text<span
                                                            style="color: red">*</span></label>
                                                    <textarea name="invoice_footer_text" id="" cols="30" rows="2" class="form-control">{{ $settings?->invoice_footer_text }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Office Address<span
                                                            style="color: red">*</span></label>
                                                    <textarea name="address" id="" cols="30" rows="2" class="form-control">{{ $settings?->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Map Link (Embed Link)<span
                                                            style="color: red">*</span></label>
                                                    <textarea name="map_link" class="form-control " rows="2" placeholder="Enter Map Link"> {{ $settings?->map_link }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Facebook</label>
                                                    <input type="text" name="facebook_url"
                                                        value="{{ $settings?->facebook_url }}" class="form-control "
                                                        placeholder="https://www.facebook.com/yourpage">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Youtube</label>
                                                    <input type="text" name="youtube_url"
                                                        value="{{ $settings?->youtube_url }}" class="form-control "
                                                        placeholder="https://www.youtube.com/yourpage">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Twitter</label>
                                                    <input type="text" name="twitter_url"
                                                        value="{{ $settings?->twitter_url }}" class="form-control "
                                                        placeholder="https://www.twitter.com/yourpage">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">LinkedIn</label>
                                                    <input type="text" name="linkedin_url"
                                                        value="{{ $settings?->linkedin_url }}" class="form-control "
                                                        placeholder="https://www.linkedin.com/yourpage">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Telegram</label>

                                                    <input type="text" name="telegram_url"
                                                        value="{{ $settings?->telegram_url }}" class="form-control "
                                                        placeholder="https://www.telegram.com/yourpage">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Instagram</label>

                                                    <input type="text" name="instagram_url"
                                                        value="{{ $settings?->instagram_url }}" class="form-control "
                                                        placeholder="https://www.instagram.com/yourpage">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">App Mode <span
                                                            style="color:red">*</span></label>
                                                    <select name="app_mode" class="form-select">
                                                        <option value="live"
                                                            {{ ($settings?->app_mode ?? '') == 'live' ? 'selected' : '' }}>
                                                            Live
                                                        </option>
                                                        <option value="local"
                                                            {{ ($settings?->app_mode ?? '') == 'local' ? 'selected' : '' }}>
                                                            Local
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">SEO Meta Description <span
                                                            style="color: red">*</span></label>
                                                    <textarea name="seo_meta_description" class="form-control " rows="3" placeholder="Enter SEO Meta Description">{{ $settings?->seo_meta_description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">SEO Keywords <span
                                                            style="color: red">*</span></label>
                                                    <textarea name="seo_keywords" class="form-control " rows="3" placeholder="Enter SEO Meta Description">{{ $settings?->seo_keywords }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Copy Right Text <span
                                                            style="color: red">*</span></label>
                                                    <textarea name="copyright_text" class="form-control " rows="3" placeholder="Enter SEO Meta Description">{{ $settings?->copyright_text }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-12 pb-3">
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="m-0">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3">
                                    <h3 class="card-title"><b>Google Login</b></h3>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form action="{{ route('admin.settings.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Client ID</label>
                                            <input type="text" name="google_client_id"
                                                value="{{ $settings?->google_client_id }}" class="form-control"
                                                placeholder="Enter Client ID">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Secret</label>
                                            <input type="text" name="google_client_secret"
                                                value="{{ $settings?->google_client_secret }}" class="form-control"
                                                placeholder="Enter Secret">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Redirect Link</label>
                                            <input type="text" name="google_callback_url"
                                                value="{{ $settings?->google_callback_url }}" class="form-control"
                                                placeholder="Enter Redirect Link">
                                        </div>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3">
                                    <h3 class="card-title"><b>Facebook Login</b></h3>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form action="{{ route('admin.settings.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Client ID</label>
                                            <input type="text" name="facebook_client_id"
                                                value="{{ $settings?->facebook_client_id }}" class="form-control"
                                                placeholder="Enter Client ID">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Secret</label>
                                            <input type="text" name="facebook_client_secret"
                                                value="{{ $settings?->facebook_client_secret }}" class="form-control"
                                                placeholder="Enter Secret">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Redirect Link</label>
                                            <input type="text" name="facebook_callback_url"
                                                value="{{ $settings?->facebook_callback_url }}" class="form-control"
                                                placeholder="Enter Redirect Link">
                                        </div>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="m-0">
        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3">
                                    <h3 class="card-title"><b>Paypal Settings</b></h3>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form action="{{ route('admin.settings.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select name="paypal_enable" class="form-select">
                                                <option value="1"
                                                    {{ $settings?->paypal_enable === '1' ? 'selected' : '' }}>ON</option>
                                                <option value="0"
                                                    {{ $settings?->paypal_enable === '0' ? 'selected' : '' }}>OFF</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Mode</label>
                                            <select name="paypal_mode" class="form-select">
                                                <option value="on"
                                                    {{ $settings?->paypal_mode === 'on' ? 'selected' : '' }}>Sandbox
                                                </option>
                                                <option value="off"
                                                    {{ $settings?->paypal_mode === 'off' ? 'selected' : '' }}>Live</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Client Key</label>
                                            <input type="text" name="paypal_client_id"
                                                value="{{ $settings?->paypal_client_id }}" class="form-control"
                                                placeholder="Enter Secret">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Secret</label>
                                            <input type="text" name="paypal_client_secret"
                                                value="{{ $settings?->paypal_client_secret }}" class="form-control"
                                                placeholder="Enter Redirect Link">
                                        </div>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="d-flex justify-content-between align-items-center m-3">
                                    <h3 class="card-title"><b>Stripe Settings</b></h3>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <form action="{{ route('admin.settings.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select name="stripe_enable" class="form-select">
                                                <option value="1"
                                                    {{ $settings?->stripe_enable === 'on' ? 'selected' : '' }}>ON</option>
                                                <option value="0"
                                                    {{ $settings?->stripe_enable === 'off' ? 'selected' : '' }}>OFF</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Mode</label>
                                            <select name="stripe_mode" class="form-select">
                                                <option value="on"
                                                    {{ $settings?->stripe_mode === 'on' ? 'selected' : '' }}>Sandbox
                                                </option>
                                                <option value="off"
                                                    {{ $settings?->stripe_mode === 'off' ? 'selected' : '' }}>Live</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Publishable Key</label>
                                            <input type="text" name="stripe_publishable_key"
                                                value="{{ $settings?->stripe_publishable_key}}" class="form-control"
                                                placeholder="Enter Secret">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Secret</label>
                                            <input type="text" name="stripe_secret_key"
                                                value="{{ $settings?->stripe_secret_key }}" class="form-control"
                                                placeholder="Enter Redirect Link">
                                        </div>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>


@endsection
