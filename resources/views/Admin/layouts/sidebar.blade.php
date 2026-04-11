<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            @php
                $setting = \App\Models\Setting::first();
                $logo = $setting?->site_logo;
            @endphp

            @if ($logo)
                <img src="{{ asset($logo) }}" alt="Admin Logo" class="w-75 default-image" />
            @else
                <img src="{{ asset('images/default-logo.png') }}" alt="Admin Logo" class="w-75 default-image" />
            @endif
        </a>

    </div>
    {{-- <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">
                @can('admin.dashboard')
                    <li class="nav-item @yield('dashboardMenuOpen')">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link @yield('dashboardActive')">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                @endcan
                @canany(['admin.index', 'admin.roles.index'])
                <li class="nav-item @yield('CategoryMenuOpen')">
                    <a href="#" class="nav-link @yield('CategoryActive')">
                        <i class="nav-icon bi bi-circle-fill"></i>
                        <p>
                            Products
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('admin.index')
                            <li class="nav-item">
                                <a href="{{ route('admin.category.index') }}" class="nav-link @yield('categoryList')">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>category</p>
                                </a>
                            </li>
                        @endcan
                        @can('admin.roles.index')
                            <li class="nav-item">
                                <a href="{{ route('admin.subcategory.index') }}" class="nav-link @yield('subcategoryList')">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Subcategory</p>
                                </a>
                            </li>
                        @endcan
                        @can('admin.roles.index')
                            <li class="nav-item">
                                <a href="{{ route('admin.childcategory.index') }}" class="nav-link @yield('childcategoryList')">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Childcategory</p>
                                </a>
                            </li>
                        @endcan
                        @can('admin.roles.index')
                            <li class="nav-item">
                                <a href="{{ route('admin.color.index') }}" class="nav-link @yield('colorList')">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Color</p>
                                </a>
                            </li>
                        @endcan
                        @can('admin.roles.index')
                            <li class="nav-item">
                                <a href="{{ route('admin.size.index') }}" class="nav-link @yield('sizeList')">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Size</p>
                                </a>
                            </li>
                        @endcan
                        @can('admin.roles.index')
                            <li class="nav-item">
                                <a href="{{ route('admin.brand.index') }}" class="nav-link @yield('brandList')">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Brand</p>
                                </a>
                            </li>
                        @endcan
                        @can('admin.roles.index')
                            <li class="nav-item">
                                <a href="{{ route('admin.product.index') }}" class="nav-link @yield('productList')">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Product</p>
                                </a>
                            </li>
                        @endcan


                    </ul>
                </li>
                @endcanany

                <li class="nav-item @yield('BannerMenuOpen')">
                    <a href="#" class="nav-link @yield('BannerActive')">
                        <i class="nav-icon bi bi-circle-fill"></i>
                        <p>
                            Banner & Ads
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('admin.index')
                            <li class="nav-item">
                                <a href="{{ route('admin.banner-category.index') }}" class="nav-link @yield('bannerCategoryList')">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Banner Category</p>
                                </a>
                            </li>
                        @endcan
                        @can('admin.roles.index')
                            <li class="nav-item">
                                <a href="{{ route('admin.banner-ads.index') }}" class="nav-link @yield('bannerAdsList')">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Banner & Ads</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>

                <li class="nav-item @yield('UserMenuOpen')">
                    <a href="#" class="nav-link @yield('UserActive')">
                        <i class="nav-icon bi bi-circle-fill"></i>
                        <p>
                            User Manage
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('admin.index')
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}" class="nav-link @yield('UserList')">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Customer</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>


                @canany(['admin.index', 'admin.roles.index'])
                    <li class="nav-item @yield('SliderMenuOpen')">
                        <a href="#" class="nav-link @yield('SliderActive')">
                            <i class="nav-icon bi bi-circle-fill"></i>
                            <p>
                                Sliders
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('admin.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.slider.index') }}" class="nav-link @yield('sliderList')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Slider</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['admin.index', 'admin.roles.index'])
                    <li class="nav-item @yield('AdminMenuOpen')">
                        <a href="#" class="nav-link @yield('AdminActive')">
                            <i class="nav-icon bi bi-circle-fill"></i>
                            <p>
                                Manage Admin
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('admin.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.index') }}" class="nav-link @yield('adminList')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Admins</p>
                                    </a>
                                </li>
                            @endcan
                            @can('admin.roles.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}" class="nav-link @yield('adminRoleActive')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Admin Role</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
                @canany(['admin.settings.index', 'admin.settings.update'])
                    <li class="nav-item @yield('settingMenuOpen')">
                        <a href="#" class="nav-link @yield('settingActive')">
                            <i class="nav-icon bi bi-circle-fill"></i>
                            <p>
                                Settings
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can(['admin.settings.index', 'admin.settings.update'])
                                <li class="nav-item">
                                    <a href="{{ route('admin.settings.index') }}" class="nav-link @yield('settings')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>General Settings</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

            </ul>
        </nav>
    </div> --}}

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">

                {{-- Dashboard --}}
                @can('admin.dashboard')
                    <li class="nav-item @yield('dashboardMenuOpen')">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link @yield('dashboardActive')">
                            <i class="nav-icon bi bi-speedometer"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                @endcan

                {{-- Products --}}
                @canany(['admin.category.index','admin.subcategory.index','admin.childcategory.index','admin.color.index','admin.size.index','admin.brand.index','admin.product.index'])
                    <li class="nav-item @yield('CategoryMenuOpen')">
                        <a href="#" class="nav-link @yield('CategoryActive')">
                            <i class="nav-icon bi bi-box"></i>
                            <p>
                                Products
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @can('admin.category.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.category.index') }}" class="nav-link @yield('categoryList')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                            @endcan

                            @can('admin.subcategory.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.subcategory.index') }}" class="nav-link @yield('subcategoryList')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Subcategory</p>
                                    </a>
                                </li>
                            @endcan

                            @can('admin.childcategory.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.childcategory.index') }}" class="nav-link @yield('childcategoryList')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Child Category</p>
                                    </a>
                                </li>
                            @endcan

                            @can('admin.color.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.color.index') }}" class="nav-link @yield('colorList')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Color</p>
                                    </a>
                                </li>
                            @endcan

                            @can('admin.size.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.size.index') }}" class="nav-link @yield('sizeList')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Size</p>
                                    </a>
                                </li>
                            @endcan

                            @can('admin.brand.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.brand.index') }}" class="nav-link @yield('brandList')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Brand</p>
                                    </a>
                                </li>
                            @endcan

                            @can('admin.product.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.product.index') }}" class="nav-link @yield('productList')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Product</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                {{-- Banner & Ads --}}
                @canany(['admin.banner-category.index','admin.banner-ads.index'])
                    <li class="nav-item @yield('BannerMenuOpen')">
                        <a href="#" class="nav-link @yield('BannerActive')">
                            <i class="nav-icon bi bi-images"></i>
                            <p>
                                Banner & Ads
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @can('admin.banner-category.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.banner-category.index') }}" class="nav-link @yield('bannerCategoryList')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Banner Category</p>
                                    </a>
                                </li>
                            @endcan

                            @can('admin.banner-ads.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.banner-ads.index') }}" class="nav-link @yield('bannerAdsList')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Banner & Ads</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                {{-- User Manage --}}
                @can('admin.users.index')
                    <li class="nav-item @yield('UserMenuOpen')">
                        <a href="#" class="nav-link @yield('UserActive')">
                            <i class="nav-icon bi bi-people"></i>
                            <p>
                                User Manage
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}" class="nav-link @yield('UserList')">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Customer</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                {{-- Sliders --}}
                @can('admin.slider.index')
                    <li class="nav-item @yield('SliderMenuOpen')">
                        <a href="#" class="nav-link @yield('SliderActive')">
                            <i class="nav-icon bi bi-sliders"></i>
                            <p>
                                Sliders
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.slider.index') }}" class="nav-link @yield('sliderList')">
                                    <i class="nav-icon bi bi-circle"></i>
                                    <p>Slider</p>
                                </a>
                            </li>
                        </ul>
                      
                    </li>
                @endcan

                {{-- Admin --}}
                @canany(['admin.index','admin.roles.index'])
                    <li class="nav-item @yield('AdminMenuOpen')">
                        <a href="#" class="nav-link @yield('AdminActive')">
                            <i class="nav-icon bi bi-shield-lock"></i>
                            <p>
                                Manage Admin
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @can('admin.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.index') }}" class="nav-link @yield('adminList')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Admins</p>
                                    </a>
                                </li>
                            @endcan

                            @can('admin.roles.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}" class="nav-link @yield('adminRoleActive')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Admin Role</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                {{-- Settings --}}
                @canany(['admin.settings.index','admin.settings.update'])
                    <li class="nav-item @yield('settingMenuOpen')">
                        <a href="#" class="nav-link @yield('settingActive')">
                            <i class="nav-icon bi bi-gear"></i>
                            <p>
                                Settings
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @can('admin.settings.index')
                                <li class="nav-item">
                                    <a href="{{ route('admin.settings.index') }}" class="nav-link @yield('settings')">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>General Settings</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

            </ul>
        </nav>
    </div>

</aside>
