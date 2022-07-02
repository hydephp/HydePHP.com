<!DOCTYPE html>
<html lang="{{ config('hyde.language', 'en') }}">
<head>
    @include('hyde::layouts.head')
</head>
<body id="app" class="flex flex-col min-h-screen overflow-x-hidden bg-standard">
    <a href="#content" id="skip-to-content">Skip to content</a>
    @include('hyde::layouts.navigation') 

    <section>
        @yield('content') 
    </section>

    @includeUnless(config('hyde.footer.enabled', true), 'hyde::layouts.footer') 

    @include('hyde::layouts.scripts') 
</body>
</html>
