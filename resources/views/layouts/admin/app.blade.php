<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@if(@$title) {{$title}} @else {{ config('app.name', 'Dutchess Care') }} @endif</title>
        @include('layouts.admin.css')
	</head>
	<body>
		<div id="full-loader">
          	<div id="loader"></div>
        </div>
        <div id="wrapper">
            @if(Auth::guard('admin')->check())

                    @include('layouts.admin.sidebar')
                    <div class="main-panel">
                        @include('layouts.admin.header')
                        @yield('content')
                        @include('layouts.admin.footer')
                    </div>
            @else

                <section id="main" class="main-class">
                    @yield('content')
                </section>

            @endif
        </div>
        @include('layouts.admin.js')

	</body>
</html>
