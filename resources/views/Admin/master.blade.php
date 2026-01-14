<!doctype html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
<meta name="color-scheme" content="light dark" />
<meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
<meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />

<meta name="title" content="AdminLTE v4 | Dashboard" />
<meta name="author" content="ColorlibHQ" />
<meta name="description" content="" />
<meta name="keywords"content="bootstrap 5," />
<meta name="supported-color-schemes" content="light dark" />


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> @yield('title') - {{ config('app.name', 'Venmeo.de') }} </title>

    @include('Admin.includes.header')



</head>



<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

    <div class="app-wrapper">

        @include('Admin.layouts.navbar')


        @include('Admin.layouts.sidebar')

        <main class="app-main">
            @yield('content')
        </main>
        @include('Admin.layouts.footer')
    </div>
    @include('Admin.includes.script')
    @yield('script')
</body>

</html>
